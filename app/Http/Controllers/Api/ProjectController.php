<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        //$projects = Project::all();
        /* qui oltre a prendere tutti dati dal model project, 
        gli dico di aggiungere type e technologies, le funzioni che ho nel 
        model Project per i dati delle altre tabelle fuori da projects */
        $projects = Project::with('type','technologies')->get();


        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    /* $slug lo passa Laravel in automatico. Riprende la parte variabile { slug } in api.php nella rotta api 
    per il singolo progetto  */
    public function show($slug) {        
        $project = Project::where('slug', '=', $slug)->with('type','technologies')->first();
        
        $data = [
            'success' => true,
            'project' => $project
        ];

        return response()->json($data);

    }
}
