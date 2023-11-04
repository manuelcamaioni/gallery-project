@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <form action="{{ route('admin.comment.store') }}" method="POST">
                    @csrf


                    <div class="mb-5">
                        <label for="user" class="form-label d-block">
                            Text
                        </label>
                        <input type="textarea" value="{{ $comment->text }}" rows="3" class="form-control">
                    </div>
                    @error('text')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    @error('visible')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-5">
                        <label for="visible" class="form-label">
                            Visible
                        </label>
                        <input type="checkbox" name="visible" value="1" checked>
                        <input type="hidden" name="visible" value="0">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="me-3 btn btn-primary">
                            Create comment
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
