<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Job;

use App\Models\Item;

use App\Models\Post;

use App\Models\User;

class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        //$user = auth()->user()->pluck('user.user_id');
        //$posts = Post::wherein('user_id',$user)->with('user')->latest()->paginate(5);
        //$jobs = Job::wherein('user_id',$user)->with('user')->latest()->paginate(5);
        //$items = Item::wherein('user_id',$user)->with('user')->latest()->paginate(5);
        //auth()->user()->following()->pluck('profiles.user_id');
        //
        //
       
        //dd($jobs);
        return view('dashboard')->with('posts',$user->posts)->with('items',$user->items)->with('jobs',$user->jobs);
    }
}
