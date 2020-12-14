<?php

namespace App\Http\Controllers;

use App\Piece;
use App\Models\PieceType;
use App\Models\Project;
use App\Models\Material;
use App\Models\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PieceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $piecesTypes = PieceType::all();
    

        //$projects = Project::where('finished_at', '=', NULL)->with("client")->get();
        $projects = Project::where('finished_at', '=', NULL)->get();
        
        foreach($projects as $project){
            $project->client->name = ucfirst($project->client->name);
        }
        $clients = Client::where('visible', '=', 1)->get(); 

        $materials = Material::where('visible', '=', 1)->get();
        foreach($materials as $material){
            $material->material = ucfirst($material->material);
        }
        return view('pieces/index', compact('piecesTypes', 'projects', 'materials', 'clients'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //dd($request->all());
    
        $data = request()->validate([
            'pieceType_id' => ['required'],
            'quantity' => ['required', 'int'],
            'material_id' => ['required'],
            'project_id' => ['required'],
        ]);
     
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
}
