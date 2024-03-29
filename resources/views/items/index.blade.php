@extends('layouts.app')

@section('content')
<h1>Items For Sale</h1>
    @if (count($items)>0)
        @foreach($items as $item)
            <div class="well">
                <div class="col-md-4 col-sm-4">
                    <img style="width:100%" src="/storage/items/cover_images/{{$item->cover_image}}">
                </div>
                <div class="col-md-8 col-sm-8">
                    <h5><a href="/items/{{$item->id}}">{{$item->title}}</a></h5>
                    <small>Posted:{{$item->created_at}} by {{$item->user->name}} </small>
                </div>
               
            </div>
        @endforeach
        {{$items->links()}}
    @else
    <p>No Items Found.</p>
    @endif
@endsection

