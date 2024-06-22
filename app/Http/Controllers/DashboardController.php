<?php

namespace App\Http\Controllers;

use App\Models\Concept;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        //check if there is a search
        //if there is, check the search value with our database

        $concepts=Concept::orderBy('created_at',"DESC");

        if(request()->has('search')){
            //where ... content like %hello%
            $concepts = $concepts->where('content',"like",'%'.request()->get('search',"").'%');
        }


        return view('dashboard',[
            'concepts'=>$concepts->paginate(5)
        ]);
    }
}
