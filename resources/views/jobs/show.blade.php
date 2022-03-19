@extends('layouts.app')

@section('content')

<a href="/items" class="btn btn-info">Go Back</a>
<h1>{{$Job->title}}</h1>
{!!Form::open(['action'=> 'FavouritesController@addFavourite','method'=>'POST']) !!}
{{Form::hidden('job_id',$Job->id)}} 
{{ Form::submit('Add Favourites', ['class'=>'btn btn-primary']) }}  
{!! Form::close() !!}
<h4>Status: {{$Job->active}}</h4>
<div>{{$Job->description}}</div>
<div><h4>KES: {{$Job->budget}}</h4></div>
<hr>
<small>Posted: {{$Job->created_at}} by {{$Job->user->name}} </small> 
<hr>
<h3>Messages</h3>
@if($UserType == 'Worker')
    @if($Threads != false)
        @foreach($Threads as $Thread)
            <a href="/threads/{{$Thread->id}}" class="btn btn-primary">Job Chat</a>
        @endforeach
    @else
        {!!Form::open(['action'=> 'ThreadsController@createThread','method'=>'POST']) !!}
        {{Form::hidden('job_id',$Job->id)}} 
        {{ Form::submit('Message', ['class'=>'btn btn-primary']) }}  
        {!! Form::close() !!}
    @endif
@endif
@if($UserType == 'Resident')
    @if(count($Threads) > 0)
        @foreach($Threads as $Thread) 
            <h4>Participants</h4>
                <ul>
                    @if(count($Threads->Users) > 0)
                        @foreach($Thread->Users as $ThreadUser) 
                            <li>{{$ThreadUser->name}}</li>
                        @endforeach
                    @endif
                </ul>
                <a href="/threads/{{$Thread->id}}" class="btn btn-primary">View Conversation</a>
                <hr>
        @endforeach
    @else 
                <p>No Messages</p>
    @endif
@endif

@if(!Auth::guest())
    @if(Auth::user()->id == $Job->user_id)
        <a href="/jobs/{{$Job->id}}/edit" class="btn btn-primary">Edit Job</a>


        {!!Form::open(['action'=> ['JobsController@destroy', $Job->id],'method'=>'POST','class' => 'float-right']) !!}
        {{Form::hidden('_method','DELETE')}}
        {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
        {!! Form::close() !!}

    @endif
@endif

@endsection