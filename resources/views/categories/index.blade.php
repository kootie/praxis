@extends('layouts.app')

@section('content')
<h1>Categories</h1>
    @if (count($categories)>0)
        @foreach($categories as $category)
            <div class="well">
                <div class="col-md-4 col-sm-4">
                    <img style="width:100%" src="/storage/categories/cover_images/{{$category->cover_image}}">
                </div>
                <div class="col-md-8 col-sm-8">
                    <h5><a href="/categories/{{$category->id}}">{{$category->name}}</a></h5>
                </div>
                
            </div>
        @endforeach
        <div class="well">{{$categories->links()}}</div>
    @else
    <p>No Categories Found.</p>
    @endif
@endsection

