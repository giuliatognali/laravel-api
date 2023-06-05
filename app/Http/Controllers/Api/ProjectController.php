<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){

       $projects = Project::with('type', 'technologies')->get();
        //$projects = Project::->paginate(6);   //elementi per pagina (6) per la paginazione di molti elementi

        return response()->json( [
            'success'=> true,
            'results' => $projects
        ]);
    }
    //public function show(int $id){ //chiamata all'API tramite ID e non più tramite slug
        //$project = Project::where('id', $id)->with('type', 'technologies')->first();
        

public function show(string $slug){
    try{
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
    } catch(\Throwable $th){
        return response()->json( [
            'success'=> false,
            'results' => null
        ], 500);
    }
    

    }
}
