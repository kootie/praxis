@extends('layouts.app')

@section('content')
<h1>Add Categories</h1>
{!! Form::open(['action'=> 'CategoriesController@store', 'method'=>'POST','enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name','',['class'=>'form-control','placeholder'=>'name'])}}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description','',['class'=>'form-control','placeholder'=>'description'])}}
    </div>
    <div class="form-group">
        {{ Form::file('cover_image') }}    
    </div>
    {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
{!! Form::close() !!}
@endsection

