<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){

       $projects = Project::with('type', 'technologies')->get();
        //$projects = Project::->paginate(5);   //elementi per pagina (5) per la paginazione di molti elementi

        return response()->json( [
            'success'=> true,
            'results' => $projects
        ]);
    }
    public function show(string $slug){

        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();
        if($project){
            return response()->json( [
                'success'=> true,
                'results' => $project
            ]);
        } else {
            return response()->json( [
                'success'=> false,
                'results' => null
            ], 404);
        }

    }
}
