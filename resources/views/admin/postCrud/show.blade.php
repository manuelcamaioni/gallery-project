@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 p-0 d-flex justify-content-center">
                <div class="card card-show">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-0">
                            <img src="{{ $post->image }}" alt="" class="w-100 image-show">
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                <h5>Author</h5>
                                <p class="fw-bold m-0">{{ $post->user->name }}</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="#" class="btn btn-danger">Report</a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <h5>Date</h5>
                            {{ $post->created_at }}
                        </li>
                        <li class="list-group-item">
                            <h5>Tags</h5>
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('admin.tag.show', $tag) }}">{{ $tag->name }}</a>
                            @endforeach
                        </li>

                        <li class="list-group-item">
                            <h5>Comments</h5>

                            <form action="{{ route('admin.comment.store') }}" method="POST">
                                @csrf
                                <input type="text" name='text' class="w-100" placeholder="Enter a comment">
                                <input type="hidden" value="{{ $post->id }}" name="post_id">
                            </form>

                            @foreach ($post->comments->reverse() as $comment)
                                <div class="mt-2">
                                    <span class="fw-bold">{{ $comment->user->name }}</span>
                                    <span>{{ $comment->text }}</span>
                                </div>
                            @endforeach
                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection
