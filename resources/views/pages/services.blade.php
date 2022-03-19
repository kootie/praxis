@extends('layouts.open')

@section('content')

    <div class="jumbotron text-white jumbotron-image shadow" style="background-image: url({{ asset('images/inner.jpg') }} );">
      <h2 class="mb-4">
        <h1>{{$title}}</h1>
      </h2>
      <p class="mb-4">
        <p>
            @if(count($services) > 0)
            <ul class="list-group text-dark">
                @foreach($services as $service)
                    <li class="list-group-item">{{$service}}</li>
                @endforeach
            </ul>
            @endif
        </p>
      </p>      
    </div>
    
@endsection