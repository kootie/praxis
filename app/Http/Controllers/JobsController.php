<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Job;

use \Illuminate\Support\Facades\Auth;

use App\Models\Category;

class JobsController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$User = Auth::user();
        //$Jobs = $User->jobs->all();

        //$jobs = Job::orderBy('title','asc')->paginate(10);
        //return view('jobs.index')->with('jobs', $jobs);
        $Jobs = Job::orderBy('title','asc')->paginate(10);
        return view('jobs.index')->with('Jobs',$Jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string',
            'description' => 'required|string',
            'budget' => 'required|numeric',
            'active' => 'required|string',
            'category_id' => 'required|numeric',     
        ]);

        $Job = new Job;
        $Job->title = $request->input('title');
        $Job->description = $request->input('description');
        $Job->budget = $request->input('budget');
        $Job->active = $request->input('active');
        $Job->category_id = $request->input('category_id');
        $user = Auth::user();   
        $user->jobs()->save($Job);

        return redirect('/jobs')->with('success','The Job was Created!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Job = Job::find($id);
        //get current user
        $User = Auth::user();
        //resident or worker?
        switch($User->role->name){
            Case 'Worker': 
                $Threads = [];
                $Threads = $User->Threads()->where('job_id',$Job->id)->first();
                if(is_null($Threads)){
                    $Threads = false;
                } else {
                    $Threads[] = $Thread;
                }
                $UserType = 'Worker';

            break;
            Case 'Resident': 
                //return all threads for the job
                $UserType = 'Resident';
                $Threads = [];
                $Threads = $Jobs->Threads;

            break;
            default: 
               $UserType = false;
               $Threads = [];

            break;
        }

        $Data = [
            'Job' => $Job,
            'UserType' => $UserType,
            'Threads' => $Threads,
        ];

        return view('jobs.show')->with($Data);
      //$jobs[$category->id]=Job::where('category_id',$category->id)->where('active','1')->limit(4)->get();
      //return view('jobs.show')->with('category', $category)->with('job', $job);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Job = Job::find($id);
        //check user
        if(auth()->user()->id !== $Job->user_id){
            return redirect('/jobs')->with('error','Reaching Over the Fence - Unauthorized');
        }
        return view('jobs.edit')->with('Job',$Job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|string',
            'description' => 'required|string',
            'budget' => 'required|numeric',
            'active' => 'required|string',
            'category_id' => 'required|numeric',     
        ]);

        $Job = Job::find($id);
        $Job->title = $request->input('title');
        $Job->description = $request->input('description');
        $Job->budget = $request->input('budget');
        $Job->active = $request->input('active');
        $Job->category_id = $request->input('category_id');
        $user = Auth::user();   
        $user->jobs()->save($Job);

        return redirect('/jobs')->with('success','The Job was Updated!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Job = Job::find($id);
         //check user
         if(auth()->user()->id !== $Job->user_id){
            return redirect('/jobs')->with('error','Reaching Over the Fence - Unauthorized');
        }
        $Job->delete();
        return redirect('/jobs')->with('success','The Job Marked Deleted!!!');
    }
}
