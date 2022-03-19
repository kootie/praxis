<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Thread;

use App\Models\Message;

use \Auth;


class ThreadsController extends Controller
{
    //Threads and Messages
    public function createThread(Request $request){
        $this->validate($request,[
            'job_id' => 'required|integer',
        ]);

        $Thread = new Thread;
        $Thread->job_id = $request->input('job_id');
        $Thread->save();
        $Worker = Auth::User(); // currently logged in worker
        $Resident = $Thread->Job->user;

        $Thread->Users()->save($Worker);
        $Thread->Users()->save($Resident);

        return redirect('/threads/'.$Thread->id);
    }

    //save message on this thread
    public function createMessage(Request $request, $id){
        $this->validate($request,[
            'message' => 'required|string',
        ]);

        $Message = new Message;
        $Message->message = $request->input('message');
        $Message->thread_id = $id;
        //who is posting
        $User = Auth::user();
        $User->Message()->save($Message);

        return redirect('/threads/'.$id)->with('success','message saved');
    }

    //add delete function - later

    //show thread
    public function showThread($id){
        $Thread = Thread::find($id);
        return view('threads.show')->with('Thread',$Thread);
    }

}
