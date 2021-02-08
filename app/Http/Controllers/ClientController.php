<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Material;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
     
        $clients = Client::withCount('project')->get();
        return view('client/index', compact('clients'));
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
        $validator = Validator::make($request->all(), [
            'name' => ['required','regex:/^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/', 'min:3', 'max:55', 'unique:clients'],
        ]);
        if ($validator->passes()) {
            // $data = request()->validate([
            //     'name' => ['required','regex:/^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/', 'min:3', 'max:55', 'unique:clients'],
            // ]);
            $values = ['name' => $request->name, 'visible' => False];
            if($request->visible){
                $values['visible'] = True;
            }

            Client::create($values);

            return redirect("/clients")->with('success',"Cliente '" . $values['name'] . "' creado correctamente.");
        }
        return redirect("/clients")->with('fail',"El nombre '" . $request->name . "' ya está en uso o no está permitido.");
     
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
    public function editView($clientId)
    {
        $client = Client::where('id', '=', $clientId)->withCount('project')->first();
        return view('/client/edit', compact('client'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $clientId)
    {
        //dd($request->all());
        //dd($clientId);
        
        $validator = Validator::make($request->all(), [
            'name' => ['required','string' ,'regex:/^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/', 'min:3','max:55', 'unique:clients,name,' .$clientId.',id'],
            // 'name' => ['required','regex:/^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/', 'min:3', 'max:55', 'unique:clients'],
        ]);
        if ($validator->passes()) {
            
            $values = ['name' => $request->name, 'visible' => False];
            if($request->visible){
                $values['visible'] = True;
            }

            $client = Client::find($clientId);
            //dd($client);
            //dd($values["name"]);
            if($client->name != $values["name"] || $client->visible != $values["visible"] ){
                $client->update($values);
                return redirect("/clients")->with('success',"Cliente '" . $values['name'] . "' actualizado correctamente.");
            }

            return redirect("/clients")->with('success',"El cliente '" . $values['name'] . "' no ha sufrido ningún cambio.");
            
        }
        return redirect("/clients")->with('fail',"El nombre '" . $request->name . "' ya está en uso o no está permitido.");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientToDelete = Client::where('id', '=', $id)->withCount('project')->first();
        
        if($clientToDelete->project_count == 0){
            $clientToDelete->delete();
            return redirect('/clients')->with('success', "El cliente '" . $clientToDelete->name . "' ha sido eliminado.");
        }
        return redirect('/clients')->with('fail', 'No se puede eliminar al cliente porque tiene datos relacionados con obras.');
    }
}
