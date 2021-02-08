<?php

namespace App\Http\Controllers;


use App\Models\Project;
use App\Models\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('client', 'state')->get();
        $clients = Client::where('visible', '=', '1')->get();
        return view('project/index', compact('projects', 'clients'));
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
    public function store(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => ['required','regex:/^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/', 'min:3', 'max:55', 'unique:projects'],
            'client_id' => ['required', 'int', 'not_in:0']
        ]);
        if ($validator->passes()) {

            $values = ['name' => $request->name, 'client_id' => $request->client_id, 'state_id' => 6, 'started_at' => Carbon::now()];

            Project::create($values);

            return redirect("/projects")->with('success',"Obra '" . $values['name'] . "' creado correctamente.");
        }else if($request->client_id == 0){
            return redirect("/projects")->with('fail',"Se debe elegir un cliente a la hora de crear una nueva obra.");
        }
        return redirect("/projects")->with('fail',"El nombre '" . $request->name . "' ya está en uso o no está permitido.");
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
    public function edit()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }

    public function getProjectsByClient(Request $request, Client $client){
        if($client !== null && $client->visible == 1){
            $projects = Project::where('client_id', '=', $client->id)
            ->where('finished_at', '=', NULL)->get();
            return response()->json($projects);

        }else{
            return response()->json("error");
        }
        
    }
  
}
