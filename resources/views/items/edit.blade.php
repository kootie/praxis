@extends('layouts.app')

@section('content')
<h1>Edit Items</h1>
{!! Form::open(['action'=> ['ItemsController@update',$item->id], 'method'=>'POST','enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title',$item->title,['class'=>'form-control','placeholder'=>'title'])}}
    </div>
    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body',$item->body,['class'=>'form-control','placeholder'=>'body'])}}
    </div>
    <div class="form-group">
        {{ Form::label('price', 'Price(KES)') }}
        {{ Form::number('price',$item->price,['class'=>'form-control','placeholder'=>'price','step'=> 'any'])}}
    </div>
    <div class="form-group">
        {{ Form::label('amount', 'Amount(Qty)') }}
        {{ Form::number('amount',$item->amount,['class'=>'form-control','placeholder'=>'amount','step'=> 'any'])}}
    </div>
    <div class="form-group">
        {{ Form::label('sold', 'Sold') }}
        {{Form::select('sold', ['1' => 'Sold', '2' => 'Not Sold'], $item->sold, ['placeholder' => 'Pick an option...'])}};
    </div>
    <div class="form-group">
        {{ Form::file('cover_image') }}    
    </div>
    {{Form::hidden('_method','PUT')}}
    {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection