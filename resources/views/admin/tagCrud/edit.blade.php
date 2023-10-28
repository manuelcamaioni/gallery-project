@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <form action="{{ route('admin.tag.update', $tag) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-5">
                        <label for="name" class="form-label">
                            Name
                        </label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                            value="{{ $tag->name }}">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="me-3 btn btn-primary">
                            Update tag
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
