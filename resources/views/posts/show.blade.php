@extends('layouts.main')

@section('title', 'Posts Pages')

@section('container')
<div class="container text-center my-5">
    <div class="card">
        <img class="card-img-top" src="{{ url('img/1.jpg') }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->body }}</p>
            <a href="{{ url('/posts') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection