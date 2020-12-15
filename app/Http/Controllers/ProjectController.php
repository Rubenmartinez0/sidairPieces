<?php

namespace App\Http\Controllers;


use App\Models\Project;
use App\Models\Client;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
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

    public function getProjectsByClient(Request $request, Client $client){
        if($client->visible == 1){
            $projects = Project::where('client_id', '=', $client->id)
            ->where('finished_at', '=', NULL)->get();
            return response()->json($projects);

        }else{
            return response()->json("error");
        }
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        //
    }
}
