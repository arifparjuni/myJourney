@extends('layouts.main')

@section('title', 'Posts Pages')

@section('container')
<div class="album py-5 bg-light">
    <div class="container">
        <h2>The Blogs</h2>
        <a href="/posts/create" class="btn btn-primary my-4">Tambah Post</a>
        <div class="row">
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="/storage/cover_images/{{ $post->cover_image }}" alt="" class="img-thumbnail">
                        <div class="card-body">
                            <h5><a href="">{{ $post->title }}</a></h5>
                            <p class="card-text text-muted">{{ $post->body }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <a href="/posts/{{ $post->id }}" class="btn btn-sm btn-outline-secondary">View</a>
                                <a href="/posts/{{ $post->id }}/edit" type="button" class="btn btn-sm btn-outline-secondary">Edit</a>
                                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                <button type="submit" class="btn btn-sm btn-outline-secondary ml-5" onclick="return confirm('Anda yakin mau hapus?');">Delete</button>
                                {!! Form::close() !!}
                                </div>
                                <small class="text-muted ml-2">{{ $post->created_at }}</small>
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