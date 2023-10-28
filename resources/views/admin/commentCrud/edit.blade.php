@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <form action="{{ route('admin.post.store') }}" method="POST">
                    @csrf

                    <div class="mb-5">
                        <label for="user" class="form-label d-block">
                            Text
                        </label>
                        @foreach ($users as $user)
                            <label for="user_id" class="form-label">{{ $user->name }}</label>
                            @if ($post->user_id == $user->id)
                                <input type="radio" name="user_id" value="{{ $user->id }}" class="me-3" checked>
                            @else
                                <input type="radio" name="user_id" value="{{ $user->id }}" class="me-3">
                            @endif
                        @endforeach
                    </div>
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-5">
                        <label for="image" class="form-label">
                            Image
                        </label>
                        <input type="url" class="form-control" id="image" placeholder="Enter image" name="image"
                            value="{{ $post->image }}">
                    </div>

                    @error('tags')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-5">
                        <label for="tags" class="form-label d-block">
                            Tags
                        </label>
                        @foreach ($tags as $tag)
                            <label for="tags[]" class="form-label">{{ $tag->name }}</label>

                            @if ($post->tags->contains($tag->id))
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="me-3" checked>
                            @else
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="me-3">
                            @endif
                        @endforeach
                    </div>


                    @error('visible')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-5">
                        <label for="visible" class="form-label">
                            Visible
                        </label>
                        @if ($post->visible == 1)
                            <input type="checkbox" name="visible" value="1" checked>
                        @else
                            <input type="hidden" name="visible" value="0">
                        @endif
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="me-3 btn btn-primary">
                            Update post
                        </button>
                        <button type="reset" class="btn btn-warning">
                            Reset
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
