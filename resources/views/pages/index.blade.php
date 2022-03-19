@extends('layouts.open')

@section('content')
    <div class="jumbotron text-white jumbotron-image shadow" style="background-image: url({{ asset('images/aerial.jpg') }} );">
      <h2 class="mb-4">
        <h1>{{$title}}</h1>
      </h2>
      <p class="mb-4">
        <p>Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      </p>
      <p class="mb-4">
       <a class="btn btn-primary btn-lg" href="/login" role="button" style="margin:5px;">Login</a><a class="btn btn-primary btn-lg" href="/register" role="button" style="margin:5px;">Register</a>
      </p>   
    </div>

@endsection