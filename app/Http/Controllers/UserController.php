<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Client;
use App\Models\Material;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::with('role')->get();
        //dd($users);

        return view('user/index', compact('users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editView($user_id)
    {
        dd($user_id);
        return redirect('/preferences');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        return view('/preferences');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userRequestRoleId = auth()->user()->role_id;
        $userToDelete = User::find($id);

        if($userRequestRoleId < $userToDelete->role_id){
            $userToDelete->delete();
            return redirect('/users')->with('success', "El usuario '" . $userToDelete->username . "' ha sido eliminado.");
        }
        return redirect('/users')->with('fail', 'No tienes permisos suficientes para eliminar a este usuario.');
    }


    public static function getUserCurrentPreferences(int $id)
    {
        $profile = User::where('id', '=', $id)->with(['client', 'project', 'material'])->first();

        $currentPreferences["client"] = $profile->client;
        $currentPreferences["project"] = $profile->project;
        $currentPreferences["material"] = $profile->material;

        return $currentPreferences;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPreferencesView(Request $request)
    {
        //$projects = Project::where('finished_at', '=', NULL)->get();
        
        $clients = Client::where('visible', '=', 1)->get(); 
        foreach($clients as $client){
            $client->name = ucfirst($client->name);
        }
        $materials = Material::where('visible', '=', 1)->get();
        foreach($materials as $material){
            $material->name = ucfirst($material->name);
        }
        return view('user/preferences/view', compact('clients', 'materials'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePreferences(Request $request)
    {
        $cartCurrentItems = CartController::getCartItemsCount();
        if($cartCurrentItems > 0){
            return redirect('/preferences')->with('status', 'Es necesario pedir o eliminar las piezas de tu carrito antes de cambiar tus preferencias.');
        }else{

            $redirectTo = $request->redirect_to;

            $data = $request->validate([
                'client_id' => 'required|int|not_in:0',
                'project_id' => 'required|int|not_in:0',
                'material_id' => 'required|int|not_in:0',
            ]);
            
            $user_id = auth()->user()->id;
            $user = User::find(1)->where('id',  $user_id);
            
            $user->update($data);
            if($redirectTo != ''){
                return redirect($redirectTo);
            }else{
                return redirect('/')->with('status', 'Preferencias actualizadas correctamente.');
            }
        }  
    }
}
