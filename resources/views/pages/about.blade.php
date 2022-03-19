@extends('layouts.open')

@section('content')

  <div class="jumbotron text-white jumbotron-image shadow" style="background-image: url({{ asset('images/inner.jpg') }} );">
    <h2 class="mb-4">
      <h1>{{$title}}</h1>
    </h2>
    <p class="mb-4">
      <p>Duis volutpat ex nulla, eget pellentesque nunc euismod at. Duis porttitor lacus ut purus laoreet fringilla. Vestibulum porta tortor quis dolor iaculis mollis. Donec fringilla lorem vitae ex posuere convallis. Duis iaculis odio mollis odio bibendum, eget suscipit enim ornare. Suspendisse scelerisque dolor risus, in facilisis nisl suscipit at. Cras eu ex lacinia odio molestie consequat. Mauris sed enim eget sapien dictum egestas eu sed turpis. Integer cursus, neque et vestibulum pharetra, lectus diam viverra mi, eu condimentum nulla elit vel nisi.</p>
    </p>      
  </div>
   
@endsection
