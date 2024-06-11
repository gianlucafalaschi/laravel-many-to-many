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
}
