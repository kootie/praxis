@extends('layouts.app')

@section('content')
<h1>Add Items</h1>
{!! Form::open(['action'=> 'ItemsController@store', 'method'=>'POST','enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title','',['class'=>'form-control','placeholder'=>'title'])}}
    </div>
    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body','',['class'=>'form-control','placeholder'=>'body'])}}
    </div>
    <div class="form-group">
        {{ Form::label('price', 'Price(KES)') }}
        {{ Form::number('price','',['class'=>'form-control','placeholder'=>'price','step'=> 'any'])}}
    </div>
    <div class="form-group">
        {{ Form::label('amount', 'Amount(Qty)') }}
        {{ Form::number('amount','',['class'=>'form-control','placeholder'=>'amount','step'=> 'any'])}}
    </div>
    <div class="form-group">
        {{ Form::label('sold', 'Sold') }}
        {{Form::select('sold', ['1' => 'Sold', '2' => 'Not Sold'], null, ['placeholder' => 'Pick an option...'])}};
    </div>
    <div class="form-group">
        {{ Form::file('cover_image') }}    
    </div>
    {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
{!! Form::close() !!}
@endsection