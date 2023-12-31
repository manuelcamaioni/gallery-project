@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <form action="{{ route('admin.user.update', $user) }}" method="POST">
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
                            value="{{ $user->name }}">
                    </div>


                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-5">
                        <label for="email" class="form-label">
                            Email
                        </label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"
                            value="{{ $user->email }}">
                    </div>

                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-5">
                        <label for="password" class="form-label">
                            Password
                        </label>

                        <input type="password" class="form-control" id="password" placeholder="Enter password"
                            name="password" value="{{ $user->password }}">
                    </div>



                    @error('isAdmin')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-5">
                        <label for="isAdmin" class="form-label">
                            Admin Permits
                        </label>
                        <input type="hidden" name="isAdmin" id="isAdmin" value="0">
                        <input type="checkbox" name="isAdmin" id="isAdmin" value="1"
                            {{ $user->isAdmin == 1 ? 'checked' : '' }}>
                    </div>

                    @error('active')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-5">
                        <label for="active" class="form-label">
                            Active account
                        </label>
                        <input type="hidden" name="active" id="active" value="0">
                        <input type="checkbox" name="active" id="active" value="1"
                            {{ $user->active == 1 ? 'checked' : '' }}>
                    </div>

                    @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-5">
                        <label for="gender" class="form-label">
                            Gender
                        </label>
                        <input type="text" name="gender" id="gender" value="{{ $user->gender }}">
                    </div>


                    <div class="mb-3">
                        <button type="submit" class="me-3 btn btn-primary">
                            Update account
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
