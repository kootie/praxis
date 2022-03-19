<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\Category;

use App\Models\Job;

class CategoriesController extends Controller
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
        $categories = Category::orderBy('created_at','desc')->paginate(10);
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'name' => 'required|string',
            'description' => 'required|string',
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
            $path = $request->file('cover_image')->storeAs('public/categories/cover_images',$fileNameToStore);
        } else {
            $fileNameToStore = 'categoryimage.jpg';
        }


        $Category = new Category;
        $Category->name = $request->input('name');
        $Category->description = $request->input('description');
        $Category->cover_image = $fileNameToStore;
        $Category->save();
        //$user = Auth::user();   
        //$user->category()->save($Category);

        return redirect('/categories')->with('success','The Category was Created!!!');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
      
      $category = Category::find($id);
      $category_id = $id;
      $jobs = Job::where('category_id',$category_id)->get();
      
      return view('categories.show')->with('category',$category)->with('jobs',$jobs);
      

      //$jobs[$category->id]=Job::where('category_id',$category->id)->where('active','1')->limit(4)->get();
      //return view('categories.show')->with('category', $category)->with('jobs', $jobs);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        //check user
        if(auth()->user()->role_id !== 3){
            return redirect('/categories')->with('error','Reaching Over the Fence - Unauthorized');
        }
        return view('categories.edit')->with('category',$category);
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
            'name' => 'required|string',
            'description' => 'required|string', 
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
            $path = $request->file('cover_image')->storeAs('public/categories/cover_images',$fileNameToStore);
        }

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');

        if($request->hasFile('cover_image')){
            $category->cover_image =  $fileNameToStore;
        }

        $category->save();
        //$user = Auth::user();   
        //$user->jobs()->save($Job);

        return redirect('/categories')->with('success','The Category was Updated!!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        //check user
        if(auth()->user()->role_id !== 3){
            return redirect('/categories')->with('error','Reaching Over the Fence - Unauthorized');
        }

        //check for images , dont delete default image
        if($category->cover_image != 'categoryimage.jpg'){
            //toa hio
            Storage::delete('public/categories/cover_image/'.$category->cover_image);
        }

        $category->delete();
        return redirect('/categories')->with('success','The Category Marked Deleted!!!');
    }
}
