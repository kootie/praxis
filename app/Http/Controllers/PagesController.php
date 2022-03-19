<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Mtaandao';
        return view('pages.index',compact('title'));
    }

    public function about(){
        $title = 'About';
        return view('pages.about',compact('title'));
    }

    public function contact(){
        $title = 'Contact Us';
        return view('pages.contact',compact('title'));
    }

    public function services(){
        $data = [
            'title' => 'Services',
            'services' => ['Jobs','Talk','Sales','Security']

        ];
        return view('pages.services')->with($data);
    }
}
