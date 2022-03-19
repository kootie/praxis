@extends('layouts.app')

@section('content')
<h2>{{$Thread->Job->title}} - Messages</h2>
<p>{{$Thread->Job->description}}</p>
<hr>
@if(count($Thread->Messages) > 0) 
    <table>
        @foreach($Thread->Messages as $Msg) 
            <tr>
                <th style="padding-right: 10px;">{{$Msg->User->name}}</th>
                <td>{{$Msg->message}}</td>
            </tr>
        @endforeach
    </table>
@else 
    <p>No Messages</p>
@endif
<hr>
{!!Form::open(['action'=> ['ThreadsController@createMessage', $Thread->id],'method'=>'POST']) !!}
<div class="form-group">
    {{ Form::label('message', 'Create Message') }}
    {{ Form::textarea('message','',['class'=>'form-control','placeholder'=>'message'])}}
</div>
{{ Form::submit('Message', ['class'=>'btn btn-primary']) }}
{!! Form::close() !!}
@endsection

