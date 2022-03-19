<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\Item;

class ItemsController extends Controller
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
        //$items = Item::all();
        $items = Item::orderBy('created_at','desc')->paginate(10);
        //$items = Item::orderBy('title','desc')->get();
        return view('items.index')->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
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
            'body' => 'required|string',
            'price' => 'required|numeric',
            'amount' => 'required|numeric',
            'sold' => 'required|string',  
            'cover_image' => 'image|nullable|max:1999',   
        ]);

        //file upload issues
        if($request->hasFile('cover_image')){
            //get name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //create filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/items/cover_images',$fileNameToStore);
        } else {
            $fileNameToStore = 'itemimage.jpg';
        }

        $item = new Item;
        $item->title = $request->input('title');
        $item->body = $request->input('body');
        $item->price = $request->input('price');
        $item->amount = $request->input('amount');
        $item->sold = $request->input('sold');
        $item->user_id = auth()->user()->id;
        $item->cover_image = $fileNameToStore;
        $item->save();
        //$user = Auth::user();   
        //$user->jobs()->save($Job);

        return redirect('/items')->with('success','The Sale Item was Created!!!');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        return view('items.show')->with('item',$item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        //check user
        if(auth()->user()->id !== $item->user_id){
            return redirect('/items')->with('error','Reaching Over the Fence - Unauthorized');
        }
        return view('items.edit')->with('item',$item);
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
            'body' => 'required|string',
            'price' => 'required|numeric',
            'amount' => 'required|numeric',
            'sold' => 'required|numeric', 
            'cover_image' => 'image|nullable|max:1999',    
        ]);

        //file upload issues
        if($request->hasFile('cover_image')){
            //get name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //create filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/items/cover_images',$fileNameToStore);
        }


        $item = Item::find($id);
        $item->title = $request->input('title');
        $item->body = $request->input('body');
        $item->price = $request->input('price');
        $item->amount = $request->input('amount');
        $item->sold = $request->input('sold');

        if($request->hasFile('cover_image')){
            $item->cover_image =  $fileNameToStore;
        }

        $item->save();
        //$user = Auth::user();   
        //$user->jobs()->save($Job);

        return redirect('/items')->with('success','The Sale Item was Updated!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
         //check user
         if(auth()->user()->id !== $item->user_id){
            return redirect('/items')->with('error','Reaching Over the Fence - Unauthorized');
        }
        //check for images , dont delete default image
        if($item->cover_image != 'itemimage.jpg'){
            //toa hio
            Storage::delete('public/items/cover_image/'.$item->cover_image);
        }

        $item->delete();
        return redirect('/items')->with('success','The Item Marked Deleted!!!');
    }
}
