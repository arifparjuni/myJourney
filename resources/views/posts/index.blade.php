@extends('layouts.main')

@section('title', 'Posts Pages')

@section('container')
<div class="album py-5 bg-light">
    <div class="container">
        <h2>The Blogs</h2>
        
        <div class="row">
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ url('img/1.jpg') }}" alt="" class="img-thumbnail">
                        <div class="card-body">
                            <h5><a href="">{{ $post->title }}</a></h5>
                            <p class="card-text text-muted">{{ $post->body }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">{{ $post->created_at }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection