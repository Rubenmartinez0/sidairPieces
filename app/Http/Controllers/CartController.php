<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use App\Models\CartItem;
use App\Models\CartNote;
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
        $currentNotes = CartNote::where('user_id', '=', $id)->orderBy('created_at', 'ASC')->get();
        $currentPreferences = UserController::getUserCurrentPreferences($id);
       
        return view('user/cart/view', compact('currentPieces', 'currentNotes', 'currentPreferences'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyCartItems(Request $request)
    {
        //dd($request->data[0]);
        //return $request->all();
        if($request->pieces){ // delete cart pieces
            foreach($request->pieces as $item){
                CartItem::destroy($item);
            }
        }
        if($request->notes){ // delete cart notes
            foreach($request->notes as $item){
                CartNote::destroy($item);
            }
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function cleanCartNote($id){
        CartNote::destroy($id);
    }

    public static function getCartItemsCount()
    {
        $id = Auth::user()->id;  
        $cartPiecesCount = CartItem::where('user_id', '=', $id)->count(); 
        $cartNotesCount = CartNote::where('user_id', '=', $id)->count();
        return $cartPiecesCount+$cartNotesCount;
    }

    public static function getCartNotesCount()
    {
        $id = Auth::user()->id;
        return CartNotes::where('user_id', '=', $id)->count();
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
        if($request->newQuantity){ // update piece quantity
            $itemId = $request->id;
            $newQuantity = $request->newQuantity;
            CartItem::where('id', '=', $itemId)->update(array('quantity' => $newQuantity));
            return response('Piece quantity updated correctly.', 200);
        }
        if($request->newTextValue){ // update note content
            $noteId = $request->id;
            $newTextValue = $request->newTextValue;
            $newTextValue = trim($newTextValue);

            CartNote::where('id', '=', $noteId)->update(array('content' => $newTextValue));
            return response('Note content updated correctly.', 200);
        }
        
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createNote()
    {
    
        $user_id = Auth::user()->id;
       
        $blankCartNotesCount = CartNote::where('user_id', '=', $user_id)->where('content', '=', '')->count();
        if($blankCartNotesCount > 0){
            return response('There is already a blank note', 200);
        }else{
            CartNote::create(['user_id' => $user_id, 'content' =>'']);
            return response('Note created correctly', 200);
        }
        
    }
    
    
}
