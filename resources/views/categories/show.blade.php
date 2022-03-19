@extends('layouts.app')

@section('content')

<a href="/items" class="btn btn-info">Go Back</a>
<h1>{{$category->name}} Jobs</h1>
<img style="width:100%" src="/storage/categories/cover_images/{{$category->cover_image}}">
<br><br>
<h4>Status: {{$category->description}}</h4>
<hr>
<small>Posted: {{$category->created_at}}</small> 
<hr>
@if(!Auth::guest())
    @if(Auth::user()->role_id == 3)
            <a href="/categories/{{$category->id}}/edit" class="btn btn-primary">Edit Category</a>

        {!!Form::open(['action'=> ['CategoriesController@destroy', $category->id],'method'=>'POST','class' => 'float-right']) !!}
        {{Form::hidden('_method','DELETE')}}
        {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
        {!! Form::close() !!}
<hr>
                    <h3>Jobs List</h3>
                    <hr>

                    <a href="/jobs/create" class="btn btn-primary">Create Jobs</a>
                    @if(count($jobs) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{$job->title}}</td>
                                <td><a href="/posts/{{$job->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td><a href="/posts/{{$job->id}}/edit" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <p>No Jobs under this Category.</p>
                    @endif
    @endif
@endif
@endsection