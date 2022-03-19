@extends('layouts.app')

@section('content')
<h1>Jobs</h1>
    @if (count($Jobs)>0)
        @foreach($Jobs as $Job)
            <div class="well">
                <h5><a href="/jobs/{{$Job->id}}">{{$Job->title}}</a></h5>
                <h4>{{$Job->category_id}}</h4>
                <h4>{{$Job->budget}}</h4>
                <small>Posted:{{$Job->created_at}} by {{$Job->user->name}}</small>
            </div>
        @endforeach
      {{$Job->links}}  
    @else
    <p>No Jobs Found.</p>
    @endif
@endsection
