<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use App\Models\PieceType;
use App\Models\Project;
use App\Models\Material;
use App\Models\Client;
use App\Models\Image;

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
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function choosePiece()
    {
        //dd($request->all());
    
        $pieceTypes = PieceType::where('visible', '=', 1)->get();
       
        return view('pieces/choosePiece', compact('pieceTypes'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, PieceType $pieceType)
    {
        //$projects = Project::where('finished_at', '=', NULL)->with("client")->get();
        $projects = Project::where('finished_at', '=', NULL)->get();
        
        $clients = Client::where('visible', '=', 1)->get(); 
        foreach($clients as $client){
            $client->name = ucfirst($client->name);
        }
        $materials = Material::where('visible', '=', 1)->get();
        foreach($materials as $material){
            $material->material = ucfirst($material->material);
        }

        $measurements = $pieceType->measurements;
        //dd($measurements);
        return view('pieces/create', compact('pieceType', 'measurements' , 'projects', 'materials', 'clients'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'pieceType_id' => 'required|int',
            'quantity' => 'required|int',
            'material_id' => 'required|not_in:0',
            'client_id' => 'required|not_in:0',
            'project_id' => 'required|not_in:0',
        ]);
        $data["state_id"] = 1;
        $data["ordered_by"] = auth()->user()->id;
        //dd($data);
        Piece::create($data);
  
        
        return redirect('/');

    }
}
