@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-center">{{ '#' . $tag->name }}</h2>
                <div class="d-flex flex-wrap justify-content-center">
                    @foreach ($posts as $post)
                        @if ($post->visible == 1)
                            <div class="card my-card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <h3 class="mb-0">{{ $post->user->name }}</h3>
                                    </li>
                                    <li class="list-group-item p-0 miniature">
                                        <a href="{{ route('admin.post.show', $post) }}">
                                            <img class="w-100 p-0" src="{{ $post->image }}"
                                                alt="{{ $post->user->name }}'s post">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-12 d-flex justify-content-center my-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
