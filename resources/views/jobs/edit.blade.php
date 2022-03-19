@extends('layouts.app')

@section('content')
<h1>Edit Jobs</h1>
{!! Form::open(['action'=> ['JobsController@update', $Job->id],'method'=>'POST']) !!}
    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title',$Job->title,['class'=>'form-control','placeholder'=>'title'])}}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description',$Job->description,['class'=>'form-control','placeholder'=>'description'])}}
    </div>
    <div class="form-group">
        {{ Form::label('budget', 'Budget(KES)') }}
        {{ Form::number('budget',$Job->budget,['class'=>'form-control','placeholder'=>'budget','step'=> 'any'])}}
    </div>
    <div class="form-group">
        {{ Form::label('active', 'Active') }}
        {{Form::select('active', ['1' => 'Active', '2' => 'Inactive'], $Job->active, ['placeholder' => 'Pick an option...'])}};
    </div>
    <div class="form-group">
        {{ Form::label('category_id', 'Category_id') }}
        {{Form::select('category_id', ['1' => 'Electrician', '2' => 'Plumber'], $Job->category_id, ['placeholder' => 'Pick an option...'])}};
    </div>
    {{Form::hidden('_method','PUT')}}
    {{ Form::submit('Update', ['class'=>'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection