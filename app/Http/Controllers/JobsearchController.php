<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Job;

class JobsearchController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $Jobs = Job::all();
        return view('jobsearch.index')->with('Jobs',$Jobs);
    }
}
