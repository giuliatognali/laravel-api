<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::with('type', 'technologies')->paginate(5);
        //$projects = Project::paginate(3);  //elementi per pagina (3) per la paginazione di molti elementi 

        return response()->json( [
            'success'=> 'true',
            'results' => $projects
        ]);
    }
}
