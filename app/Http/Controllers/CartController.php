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


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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
    public function show(Request $request)
    {
        $id = Auth::user()->id;
        
        $profile = User::where('id', '=', $id)->first();
        
        if(!$profile->client_id || !$profile->project_id || !$profile->material_id){
            //$redirectTo = 'myCart';
            return redirect('/preferences')->with('redirectTo', '/myCart');
        }

        $currentPieces = CartItem::where('user_id', '=', $id)->with('type')->orderBy('created_at', 'DESC')->get();
        $currentPreferences = UserController::getUserCurrentPreferences($id);
       
        return view('user/cart/view', compact('currentPieces', 'currentPreferences'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyCartItems(Request $request)
    {
        //dd($request->data[0]);
        foreach($request->data as $item){
            CartItem::destroy($item);
        }
        return response('Items deleted correctly', 200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function cleanCartItem($id){
        CartItem::destroy($id);
    }

    public static function getCartItems()
    {
        $id = Auth::user()->id;
        $currentPieces = CartItem::where('user_id', '=', $id)->count();
       
        return $currentPieces;
    }

    public static function cartItemView(Request $request, CartItem $item)
    {
        

        $piece = $item;
        $pieceType = PieceType::where('id', '=', $item->type_id)->first();
        //dd($pieceType);
        $id = Auth::user()->id;
        $currentPreferences = UserController::getUserCurrentPreferences($id);
        
        $measurements = $piece->measurements;
        
        $measurements = explode(",", $measurements);
        //dd($measurements);
        

        return view('user/cart/itemView', compact('piece', 'pieceType', 'currentPreferences', 'measurements'));
    }

    

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateItems(Request $request)
    {
        $itemId = $request->id;
        $newQuantity = $request->newQuantity;
        CartItem::where('id', '=', $itemId)->update(array('quantity' => $newQuantity));
        
    }

    
}
