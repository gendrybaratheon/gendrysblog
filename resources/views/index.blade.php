@extends('layouts.front')

@section('content')
    <div class="container-fluid postlist">
        <div class="col-sm-10 col-sm-offset-1">
            <table class="table table-bordered">
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <a href="/post/{{ $post->id }}" target="_blank">
                                {{ $post->title }}
                            </a>
                        </td>
                        <td>{{ $post->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $posts->links() !!}
        </div>
    </div>
@endsection
