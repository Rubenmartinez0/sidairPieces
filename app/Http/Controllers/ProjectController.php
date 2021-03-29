<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Material;
use App\Models\Project;
use App\Models\Client;
use App\Models\Piece;
use App\Models\Note;
use App\Models\ProjectState;
use App\Models\OrderState;

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
        $projects = Project::with('client', 'state')->withCount('pieces')->get();
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

            return redirect("/projects")->with('success',"Obra '" . $values['name'] . "' creada correctamente.");
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
    public function show($id)
    {
        $project = Project::where('id', '=', $id)->with('client', 'state', 'orders')->withCount('pieces', 'notes')->first();
        
        if($project){
            

            //dd($project);
            // $orderPieces = Piece::where('order_id', '=', $order->id)->with('state', 'type')->get();
            // $orderNotes = Note::where('order_id', '=', $order->id)->get();
            // $created_by = User::where('id', '=', $order->created_by)->first();
            // $order->ordered_by = $created_by->username;
            // $order->totalPieces = 0;
            // foreach($orderPieces as $piece){
            //     $order->totalPieces += $piece->quantity;
            // }
            // $order->totalNotes = count($orderNotes);

            // $modifyPermissions = false;
            // if(in_array($userRole, $allowedModifyRoles, true)){
            //     $modifyPermissions = true;
            // }

            // $pieceStates = PieceState::all();
            //return view('user/order/show', compact('order', 'orderPieces', 'orderNotes', 'modifyPermissions', 'pieceStates', 'orderStates'));

            ////////////////////////////////////////////////////////////////
            // $project->totalPieces = 0;
            // foreach($project->orders as $order){
            //     $order->totalPieces += $piece->quantity;
            // }
            // $order->totalNotes = count($orderNotes);

            $projectStates = ProjectState::all();
            $orderStates = OrderState::all();
            
            $project->piecesCount = 0;
            $project->notesCount = 0;
            foreach($project->orders as $order){
                $order->state = OrderState::where('id', '=', $order->state_id)->first();
                $order->material = Material::where('id', '=', $order->material_id)->first();
                $order->created_by = User::where('id', '=', $order->created_by)->first();
                $order->created_by->password = null;
                $piecesInCurrentOrder = Piece::where('order_id', '=', $order->id)->get();
               
                $piecesCountInCurrentOrder = 0;
                foreach($piecesInCurrentOrder as $piece){
                    $piecesCountInCurrentOrder += $piece->quantity;
                    $project->piecesCount += $piece->quantity;
                }
                $order->piecesCount = $piecesCountInCurrentOrder;
                $order->notesCount = Note::where('order_id', '=', $order->id)->count();
                $project->notesCount += $order->notesCount;
            }
            //dd($project);
            return view('project/show', compact('project', 'projectStates', 'orderStates'));
            
        }
        return redirect('/')->with('fail_status', "El pedido ". $order_id ." no existe.");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editView($projectId)
    {
        $project = Project::where('id', '=', $projectId)->with('client', 'state')->first();
        $states = ProjectState::all();
        $clients = Client::all();
        return view('/project/edit', compact('project', 'states', 'clients'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProject(Request $request, $projectId)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => ['required','string' ,'regex:/^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/', 'min:3','max:55', 'unique:projects,name,' .$projectId.',id'],
            'client_id' => ['required', 'int', 'not_in:0'],
        ]);
        if ($validator->passes()) {
            
            $values = ['name' => $request->name, 'client_id' => $request->client_id];

            $project = Project::find($projectId);
            
            if($project->finished_at == null && $request->state_id == 2 ){
                $values['finished_at'] = Carbon::now();
                $values['state_id'] = 2;
            }else{
                $values['state_id'] = $request->state_id;
            }
            
            $project->update($values);
            return redirect("/projects")->with('success',"La obra '" . $values['name'] . "' ha sido actualizada.");
            
        }
        return redirect("/project/edit/".$projectId)->with('fail',"El nombre de obra '" . $request->name . "' ya está en uso o no está permitido.");

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProjectState(Request $request, $projectId)
    {
        
        $validator = Validator::make($request->all(), [
            'newStateId' => ['required', 'int', 'not_in:0'],
        ]);
        if ($validator->passes()) {
            
            $values = ['state_id' => $request->newStateId];

            $project = Project::find($projectId);
            
            if($project->finished_at == null && $request->newStateId == 2 ){
                $values['finished_at'] = Carbon::now();
                $values['state_id'] = 2;
            }else{
                $values['state_id'] = $request->newStateId;
            }
            
            $project->update($values);
    
            return response('Project state updated correctly', 200);
        }
        return response("Could not update project state's", 500);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projectToDelete = Project::where('id', '=', $id)->withCount('pieces')->first();
        
        if($projectToDelete->pieces_count == 0){
            $projectToDelete->delete();
            return redirect('/projects')->with('success', "La obra '" . $projectToDelete->name . "' ha sido eliminada.");
        }
        return redirect('/projects')->with('fail', "No se puede eliminar la obra '" . $projectToDelete->name . " porque tiene piezas creadas.'");
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
