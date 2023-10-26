@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (Auth::user()->isAdmin)
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
                                            <ul class="list">

                                                @foreach ($users as $user)
                                                    @if ($user->name != Auth::user()->name)
                                                        <li class="d-flex justify-content-between mb-2">
                                                            <span>{{ $user->name }}</span>
                                                            <div class="actions">
                                                                <a href={{ route('admin.user.edit', $user) }}
                                                                    class="btn btn-outline-success">Edit</a>
                                                                <a href="{{ route('admin.user.destroy', $user) }}"
                                                                    class="btn btn-outline-danger"
                                                                    onclick="return confirm('The element will be deleted permanently. Do you want to proceed?')">Delete</a>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach

                                            </ul>
                                            <a class="btn btn-primary" href="{{ route('admin.user.create') }}">Add
                                                user</a>
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
                                            <ul class="list">
                                                @foreach ($users as $user)
                                                    <li class="text-center mt-3">
                                                        {{ $user->name }}
                                                        <ul class="list my-3">
                                                            @foreach ($user->posts as $post)
                                                                <li class="my-2">
                                                                    <img src="{{ $post->image }}" alt="">
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
                                                                    {{ $comment->text }}
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
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseFour" aria-expanded="false"
                                            aria-controls="flush-collapseFour">
                                            Tags
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <ul class="list">
                                                @foreach ($tags as $tag)
                                                    <li class="text-center mt-3">
                                                        {{ $tag->name }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            @endif
        </div>
    </div>
@endsection
