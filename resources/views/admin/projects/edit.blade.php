@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-8">
                <h2>ID: {{ $project->id }}</h2>
                <h1>
                    Edit {{ $project->title }}
                </h1>
            </div>

            <form class="col-8" action="{{ route('admin.projects.update', $project) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">
                        Title
                    </label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ old('title', $project->title) }}">
                </div>

                <div class="mb-3">
                    <label for="image" class="d-block mb-2">Image</label>
                    <input type="file" name="image" id="image" value={{ old('image', '') }}>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">
                        Description
                    </label>
                    <input type="text" class="form-control" id="description" name="description"
                        value="{{ old('description', $project->description) }}">
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">
                        Date
                    </label>
                    <input type="date" class="form-control" id="date" name="date"
                        value="{{ old('date', $project->date) }}">
                </div>


                <button type="submit" class="btn btn-primary">
                    Edit project
                </button>
                <button type="reset" class="btn btn-warning">
                    Reset fields
                </button>

            </form>
        </div>
    </div>
@endsection
