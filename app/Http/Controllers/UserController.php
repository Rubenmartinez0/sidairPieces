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
    public function showSettings(Request $request)
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
        return view('user/settings/view', compact('clients', 'materials'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateSettings(Request $request)
    {
        //
    }
}
