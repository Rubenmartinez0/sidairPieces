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
use App\Models\Note;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
            $orderId = $this->generateOrderId();
            $order = ['order_id' => $orderId, 'created_by' => $id, 'client_id' => $currentPreferences['client']['id'],
            'project_id' => $currentPreferences['project']['id'],
            'material_id' => $currentPreferences['material']['id'],'state_id' => 1];
            $order = Order::create($order);
            
            //create each piece
            foreach($currentCartItems as $piece){
                $pieceToCreate = ['quantity' => $piece->quantity, 'measurements' => $piece->measurements, 'type_id' => $piece->type_id,
                'material_id' => $currentPreferences['material']['id'], 'project_id' => $currentPreferences['project']['id'],
                'client_id' => $currentPreferences['client']['id'], 'ordered_by' => $id, 'state_id' => 1, 'order_id' => $order->id ];
                Piece::create($pieceToCreate);

                //remove cartItem from cart
                CartController::cleanCartItem($piece->id);
            }
            return redirect('/')->with('status', 'Pedido realizado correctamente.');
        }else{
            return redirect('/myCart')->with('status_fail', 'Se deben añadir piezas o notas para poder hacer un pedido.');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSummary(int $order_id)
    {
        $userId = Auth::user()->id;
        $order = Order::where('order_id', '=', $order_id)->with('client', 'project', 'material', 'state')->orderBy('created_at', 'DESC')->first();
        $orderPieces = Piece::where('order_id', '=', $order->id)->with('state', 'type')->get();
        $orderNotes = Note::where('order_id', '=', $order->id)->get();
        $created_by = User::where('id', '=', $order->created_by)->first();
        $order->ordered_by = $created_by->username;

        

        $order->totalPieces = 0;
        foreach($orderPieces as $piece){
            $order->totalPieces += $piece->quantity;
        }
        $order->totalNotes = count($orderNotes);

        
        return view('user/order/show', compact('order', 'orderPieces', 'orderNotes'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPiece(Piece $piece)
    {

        $piece = Piece::where('id', '=', $piece->id)->with('type','order', 'state', 'material', 'project', 'client')->first();
        $created_by = User::where('id', '=', $piece->ordered_by)->first();
        $piece->ordered_by = $created_by->username;
        
        //dd($piece);
        $measurements = $piece->measurements;
        $measurements = explode(",", $measurements);
        
        return view('user/order/piece/show', compact('piece', 'measurements'));
    }
    
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMyOrders()
    {
        $userId = Auth::user()->id;
        $orders = Order::where('created_by', '=', $userId)->with('client', 'project', 'material', 'state', 'notes', 'pieces')->orderBy('created_at', 'DESC')->get();
      
        return view('user/order/index', compact('orders'));
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateOrderId()
    {   
        
        $todayLastOrderId = Order::whereDate('created_at', Carbon::today())->orderBy('order_id', 'DESC')->first();

        if($todayLastOrderId){ //if there is at least one order.
            $todayLastOrderId = $todayLastOrderId->order_id;
            $newOrderId = str_pad($todayLastOrderId+1, 4, 0, STR_PAD_LEFT);
            return $newOrderId;
        }else{ // today's first order.
            $newOrderId = str_pad(1, 4, 0, STR_PAD_LEFT);
            return date('ymd') . $newOrderId;
        }
        
    }

}
