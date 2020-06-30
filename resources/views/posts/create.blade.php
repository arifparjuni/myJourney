@extends('layouts.main')

@section('title', 'add posts')

@section('container')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Form add new post
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('title', 'Title')}}
                            {{Form::text('title','',['class' => 'form-control','placeholder' => 'Title'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('body', 'Body')}}
                            {{Form::textarea('body','',['class' => 'form-control','placeholder' => 'Body'])}}
                        </div>
                        <div class="form-group">
                            {{Form::file('cover_image')}}
                        </div>
                        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>
                </div>
        </div>
    </div>
</div>
@endsection