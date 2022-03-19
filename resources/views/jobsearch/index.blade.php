@extends('layouts.app')

@section('content')
<h1>Jobs</h1>
@if(count($Jobs) > 0)

    @foreach($Jobs as $Job)

        <h1><a href="/jobs/{{$Job->id}}">{{$Job->title}}</a></h1>
        <small>{{$Job->budget}}</small>
        <h4>{{$Job->category_id}}</h4>

    @endforeach

@endif


@endsection