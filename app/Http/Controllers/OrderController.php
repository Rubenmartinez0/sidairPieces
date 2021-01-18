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
use App\Models\Order;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
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
    public function store(Request $request)
    {
        
        $id = Auth::user()->id;
        $currentCartItems = CartItem::where('user_id', '=', $id)->with('type')->orderBy('created_at', 'DESC')->get();
        $currentCartNotes = CartNote::where('user_id', '=', $id)->get();
        $currentPreferences = UserController::getUserCurrentPreferences($id);
        
        // check if there are items/pieces or notes in the cart.
        if(count($currentCartItems) || count($currentCartNotes)){
            //create a new order
            $order = ['created_by' => $id, 'client_id' => $currentPreferences['client']['id'], 'project_id' => $currentPreferences['project']['id'], 'material_id' => $currentPreferences['material']['id'], 'state_id' => 1];
            $order = Order::create($order);
            
            //create each piece
            foreach($currentCartItems as $piece){
                $pieceToCreate = ['quantity' => $piece->quantity, 'measurements' => $piece->measurements, 'type_id' => $piece->type_id,
                'material_id' => $currentPreferences['material']['id'], 'project_id' => $currentPreferences['project']['id'], 'ordered_by' => $id,
                'state_id' => 1, 'order_id' => $order->id ];
                Piece::create($pieceToCreate);

                //remove cartItem from cart
                CartItem::destroy($piece->id);
            }
            return redirect('/')->with('status', 'Pedido realizado correctamente.');
        }else{
            return redirect('/myCart')->with('status_fail', 'Se deben añadir piezas o notas para poder hacer un pedido.');
        }
        
        

        

        return redirect('/');
    }
}
