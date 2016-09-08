@extends('layouts.front')

@section('content')
    <div class="container post">
        <div class="col-sm-10 col-sm-offset-1">
            <h4>{{ $post->title }}</h4>
            <br>
            {{ $post->content }}
        </div>
    </div>
@endsection