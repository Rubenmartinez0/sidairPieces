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
use App\Models\OrderState;
use App\Models\Note;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CMSController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allowedRoles = [1,2,3];
        $userRole = Auth::user()->role_id;
        
        if(in_array($userRole, $allowedRoles, true)){
            //return view('cms/index', compact('orders'));
            return view('cms/index');
        }
        return redirect('/')->with('fail_status', "Acceso restringido, no tienes los permisos suficientes.");
    }
    
}
