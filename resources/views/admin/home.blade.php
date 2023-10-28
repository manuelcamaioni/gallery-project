@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (Auth::user()->isAdmin)
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard Admin') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('Hi! ' . Auth::user()->name) }}

                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                                            aria-controls="flush-collapseOne">
                                            Users
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <a class="btn btn-primary mb-3" href="{{ route('admin.user.create') }}">Add
                                                user</a>
                                            <ul class="list">
                                                @foreach ($users as $user)
                                                    @if ($user->name != Auth::user()->name)
                                                        <li class="d-flex justify-content-between mb-2">
                                                            <span>{{ $user->name }}</span>
                                                            <div class="actions">
                                                                <a href={{ route('admin.user.edit', $user) }}
                                                                    class="btn btn-outline-success">Edit</a>
                                                                <form class="d-inline-block"
                                                                    action="{{ route('admin.user.destroy', $user) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Are you sure you want to delete this element permanently')">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button type="submit" class="btn btn-outline-danger">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach

                                            </ul>

                                        </div>
                                    </div>

                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                            aria-controls="flush-collapseTwo">
                                            Posts
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <a class="btn btn-primary" href="{{ route('admin.post.create') }}">Add post</a>
                                            <ul class="list">
                                                @foreach ($users as $user)
                                                    <li class="text-center mt-3">
                                                        <h3 class="fw-bold">{{ $user->name . '\'s posts' }}</h3>
                                                        <ul class="list my-3">
                                                            @foreach ($user->posts as $post)
                                                                <li class="mb-4 card">
                                                                    <img class="w-100" src="{{ $post->image }}"
                                                                        alt="">
                                                                    <div class="actions my-2 d-flex justify-content-around">
                                                                        <a href={{ route('admin.post.edit', $post) }}
                                                                            class="btn btn-outline-success">Edit</a>
                                                                        <form class="d-inline-block"
                                                                            action="{{ route('admin.post.destroy', $post) }}"
                                                                            method="POST"
                                                                            onsubmit="return confirm('Are you sure you want to delete this element permanently?')">
                                                                            @csrf
                                                                            @method('DELETE')

                                                                            <button type="submit"
                                                                                class="btn btn-outline-danger">
                                                                                Delete
                                                                            </button>
                                                                        </form>

                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                                            aria-controls="flush-collapseThree">
                                            Comments
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <ul class="list">
                                                @foreach ($users as $user)
                                                    <li class="text-center mt-3">
                                                        {{ $user->name }}
                                                        <ul class="list my-3">
                                                            @foreach ($user->comments as $comment)
                                                                <li class="my-2 text-start">
                                                                    <div class="d-flex justify-content-between">
                                                                        <p>Content</p>
                                                                        <p class="w-75">{{ $comment->text }}</p>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between">
                                                                        <p>Date</p>
                                                                        <p>{{ $comment->created_at }}</p>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between">
                                                                        <p>Actions</p>
                                                                        <div class='actions'>
                                                                            <a href={{ route('admin.comment.edit', $comment) }}
                                                                                class="btn btn-outline-success">Edit</a>
                                                                            <form class="d-inline-block"
                                                                                action="{{ route('admin.comment.destroy', $comment) }}"
                                                                                method="POST"
                                                                                onsubmit="return confirm('Are you sure you want to delete this element permanently')">
                                                                                @csrf
                                                                                @method('DELETE')

                                                                                <button type="submit"
                                                                                    class="btn btn-outline-danger">
                                                                                    Delete
                                                                                </button>
                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFour"
                                            aria-expanded="false" aria-controls="flush-collapseFour">
                                            Tags
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <ul class="list">
                                                @foreach ($tags as $tag)
                                                    <li class="mt-3 d-flex justify-content-between">
                                                        <p>{{ $tag->name }}</p>
                                                        <div>
                                                            <a href={{ route('admin.tag.edit', $tag) }}
                                                                class="btn btn-outline-success">Edit</a>
                                                            <form class="d-inline-block"
                                                                action="{{ route('admin.tag.destroy', $tag) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Are you sure you want to delete this element permanently')">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="btn btn-outline-danger">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <a class="btn btn-primary" href="{{ route('admin.tag.create') }}">Add
                                                tag</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFive">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFive"
                                            aria-expanded="false" aria-controls="flush-collapseFive">
                                            Reports
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFive" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <ul class="list">
                                                @if (count($reports) > 0)
                                                    @foreach ($reports as $report)
                                                        <li class="text-center mt-3">
                                                            {{ $report->reason }}
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <p>There are no reports.</p>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-12 d-flex flex-wrap justify-content-center">

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
            @endif
        </div>
    </div>
@endsection
