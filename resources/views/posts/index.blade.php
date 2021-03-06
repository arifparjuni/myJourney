@extends('layouts.main')

@section('title', 'Posts Pages')

@section('container')
<div class="album py-5 bg-light">
    <div class="container">
        <h2>The Blogs</h2>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="/storage/cover_images/{{ $post->cover_image }}" alt="" class="img-thumbnail">
                        <div class="card-body">
                            <h5><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h5>
                            <p class="card-text text-muted">{{ substr($post->body,0,200)." ..." }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <a href="/posts/{{ $post->id }}" class="btn btn-sm btn-outline-secondary">View</a>

                                @if (!Auth::guest())
                                    @if (Auth::user()->id == $post->user_id)
                                        
                                    <a href="/posts/{{ $post->id }}/edit" type="button" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    <button type="submit" class="btn btn-sm btn-outline-secondary ml-5" onclick="return confirm('Anda yakin mau hapus?');">Delete</button>
                                    {!! Form::close() !!}
                                    @endif
                                @endif
                                </div>
                                <small class="text-muted ml-2">{{ $post->created_at }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <br>
        Halaman : {{ $posts->currentPage() }} <br/>
        Jumlah Data : {{ $posts->total() }} <br/>
        Data Per Halaman : {{ $posts->perPage() }} <br/>
        
        <div class="pagination justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection