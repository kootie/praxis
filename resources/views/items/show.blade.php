@extends('layouts.app')

@section('content')

<a href="/items" class="btn btn-info">Go Back</a>
<h1>{{$item->title}}</h1>
<img style="width:100%" src="/storage/items/cover_images/{{$item->cover_image}}">
<br><br>
<h4>Status: {{$item->sold}}</h4>
<div>{{$item->body}}</div>
<div><h4>KES: {{$item->price}}</h4></div>
<div>{{$item->amount}} - Available</div>
<hr>
<small>Posted: {{$item->created_at}} by {{$item->user->name}}</small> 
<hr>
@if(!Auth::guest())
    @if(Auth::user()->id == $item->user_id)
        <a href="/items/{{$item->id}}/edit" class="btn btn-primary">Edit Item</a>

        {!!Form::open(['action'=> ['ItemsController@destroy', $item->id],'method'=>'POST','class' => 'float-right']) !!}
        {{Form::hidden('_method','DELETE')}}
        {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
        {!! Form::close() !!}
    @endif
@endif    

@endsection

