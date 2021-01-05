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
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPreferences(Request $request)
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
        //dd($request->all());
        $redirectTo = $request->redirect_to;

        $data = $request->validate([
            'client_id' => 'required|int|not_in:0',
            'project_id' => 'required|int|not_in:0',
            'material_id' => 'required|int|not_in:0',
        ]);
        
        $user_id = auth()->user()->id;
        $user = User::find(1)->where('id',  $user_id);
        
        $user->update($data);

        if($redirectTo === 'piece'){
            return redirect('/piece');
        }else{
            return redirect('/')->with('status', 'Preferencias actualizadas correctamente.');
        }
    }
}
