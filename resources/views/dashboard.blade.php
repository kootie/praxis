@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    
                    <div class="d-flex">
                        <div class="pr-4">{{ __('Dashboard') }}</div>
                        <div class="pr-4"><strong>3</strong> jobs</div>
                        <div class="pr-4"><strong>5</strong> requests</div>
                        <div class="pr-4"><strong>12</strong> items</div>
                        <div class="pr-4"><strong>12</strong> posts</div>
                    </div>
                </div>
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <hr>
                    <h3>Your Posts</h3>
                    <hr>

                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    @if(count($posts) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <p>You Have 0 Posts.</p>
                    @endif

                    <hr>
                    <h3>Your Sell Items</h3>
                    <hr>
                    
                    <a href="/items/create" class="btn btn-primary">Create Items</a>
                    @if(count($items) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($items as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td><a href="/items/{{$item->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td><a href="/items/{{$item->id}}/edit" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <p>You Have 0 Items.</p>
                    @endif
                    <hr>
                    <h3>Your Jobs</h3>
                    <hr>

                    <a href="/jobs/create" class="btn btn-primary">Create Jobs</a>
                    <hr>
                    @if(count($jobs) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{$job->title}}</td>
                                <td><a href="/items/{{$job->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td><a href="/items/{{$job->id}}/edit" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <p>You Have 0 Jobs.</p>
                    @endif
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
