<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use App\Models\CartItem;
use App\Models\PieceType;
use App\Models\PieceState;
use App\Models\Project;
use App\Models\Material;
use App\Models\Client;
use App\Models\User;
//use App\Models\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PieceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userSettings()
    {

        return redirect('/piece');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPiece(int $piece_id)
    {
        //dd($piece_id);
        $piece = Piece::where('id', '=', $piece_id)->with('type','order', 'state', 'material', 'project', 'client')->first();
        $created_by = User::where('id', '=', $piece->ordered_by)->first();
        $piece->ordered_by = $created_by->username;
        $measurements = $piece->measurements;
        $measurements = explode(",", $measurements);
        
        $allowedModifyRoles = [1,2,3,5,6];
        $userRole = Auth::user()->role_id;
        $modifyPermissions = false;
        if(in_array($userRole, $allowedModifyRoles, true)){
            $modifyPermissions = true;
        }
        $pieceStates = PieceState::all();

        return view('user/order/piece/show', compact('piece', 'measurements','pieceStates','modifyPermissions'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function choosePiece()
    {
        $id = Auth::user()->id;
        $profile = User::where('id', '=', $id)->first();
        
        
        if(!$profile->client_id || !$profile->project_id || !$profile->material_id){
            //$redirectTo = 'piece';
            return redirect('/preferences')->with('redirectTo', '/piece');
        }

        $profile = User::where('id', '=', $id)->with(['client', 'project', 'material'])->first();

        $currentPreferences = UserController::getUserCurrentPreferences($id);

        $pieceTypes = PieceType::where('visible', '=', 1)->get();
        return view('pieces/choosePiece', compact('pieceTypes', 'currentPreferences'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addPieceToCartView(Request $request, PieceType $pieceType)
    {

        $measurements = $pieceType->measurements;
        //dd($measurements);

        $id = Auth::user()->id;

        $currentPreferences = UserController::getUserCurrentPreferences($id);

        return view('pieces/addToCart', compact('pieceType', 'measurements' , 'currentPreferences'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storePieceToCart(Request $request)
    {
        
        $data = $request->validate([
            'type_id' => 'required|int',
            'quantity' => 'required|int',
            'material_id' => 'required|not_in:0',
            'client_id' => 'required|not_in:0',
            'project_id' => 'required|not_in:0',
        ]);
        $data["user_id"] = auth()->user()->id;



        $currentPieceMeasurements = PieceType::where('id', '=', $data['type_id'])->first();
        $measurementsToDb = '';
        foreach($currentPieceMeasurements->measurements as $measure){
            if($request->$measure){ // Check that current measure exists
                $measurementsToDb .= $measure . ":" . $request->$measure . ',';
            }
        }
        //dd($measurementsToDb);
        $measurementsToDb = rtrim($measurementsToDb, ", ");
        
        //dd($measurementsToDb);
        $data["measurements"] = $measurementsToDb;
        CartItem::create($data);

        return redirect('/piece');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myOrderedPieces(Request $request, User $user)
    {   
        $allOrders = Piece::where('ordered_by', '=', $user->id)->with('state', 'project', 'type', 'material')->orderBy('ordered_at', 'DESC')->get();
        //$allOrders = Piece::with('state', 'project', 'type', 'material')->get();

        //dd($allOrders);getUserCurrentPreferences
        return view('pieces/myOrders', compact('allOrders', 'user'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePieceState(Request $request)
    { 
        $allowedModifyRoles = [1,2,3,5,6];
        $userRole = Auth::user()->role_id;

        if(in_array($userRole, $allowedModifyRoles, true)){
            if($request->newStateId && $request->pieceIdToUpdate){
                $pieceId = $request->pieceIdToUpdate;
                $stateId = $request->newStateId;
                $userId = Auth::user()->id;

                //manufactured by, state 
                Piece::where('id', '=', $pieceId)->update(array('state_id' => $stateId, 'manufactured_by' => $userId,
                'manufactured_at' => Carbon::now()));

                return response('Piece state updated correctly.', 200);
            }
        }
        return response('Not authorized.', 403);
    }

}
