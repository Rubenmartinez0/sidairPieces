<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use App\Models\PieceType;
use App\Models\PieceState;
use App\Models\Project;
use App\Models\Material;
use App\Models\Client;
use App\Models\User;
//use App\Models\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function choosePiece()
    {
        
        $id = Auth::user()->id;
        $profile = User::where('id', '=', $id)->first();
        
        //dd($profile);
        if(!$profile->project_id || !$profile->material_id){
            return redirect('/settings');
        }

        $pieceTypes = PieceType::where('visible', '=', 1)->get();
        return view('pieces/choosePiece', compact('pieceTypes'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, PieceType $pieceType)
    {
        //$projects = Project::where('finished_at', '=', NULL)->with("client")->get();
        $projects = Project::where('finished_at', '=', NULL)->get();
        
        $clients = Client::where('visible', '=', 1)->get(); 
        foreach($clients as $client){
            $client->name = ucfirst($client->name);
        }
        $materials = Material::where('visible', '=', 1)->get();
        foreach($materials as $material){
            $material->name = ucfirst($material->name);
        }

        $measurements = $pieceType->measurements;
        //dd($measurements);
        return view('pieces/create', compact('pieceType', 'measurements' , 'projects', 'materials', 'clients'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'type_id' => 'required|int',
            'quantity' => 'required|int',
            'material_id' => 'required|not_in:0',
            'client_id' => 'required|not_in:0',
            'project_id' => 'required|not_in:0',
        ]);
        $data["state_id"] = 1;
        $data["ordered_by"] = auth()->user()->id;
        //dd($data);
        Piece::create($data);
  
        return redirect('/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMyOrders(Request $request, User $user)
    {   
        $allOrders = Piece::where('ordered_by', '=', $user->id)->with('state', 'project', 'type', 'material')->orderBy('ordered_at', 'DESC')->get();
        //$allOrders = Piece::with('state', 'project', 'type', 'material')->get();

        //dd($allOrders);
        return view('pieces/myOrders', compact('allOrders', 'user'));
    }
}
