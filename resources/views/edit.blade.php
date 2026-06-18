@extends('layout.master')
@section('content')
    <form method="post" action="{{ route('users.update', $crud->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="first_name">First Name:</label><br><br>
            <input type="text" name="first_name" value="{{ old('first_name', $crud->first_name) }}">
            @error('first_name')
                <br/><span>{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="last_name">Last Name:</label><br><br>
            <input type="text" name="last_name" value="{{ old('last_name', $crud->last_name) }}">
            @error('last_name')
                <br/><span>{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="gender">Gender:</label><br><br>
            <input type="text" name="gender" value="{{ old('gender', $crud->gender) }}">
            @error('gender')
                <br/><span>{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="qualification">Qualifications:</label><br><br>
            <input type="text" name="qualification" value="{{ old('qualification', $crud->qualification) }}">
            @error('qualification')
                <br/><span>{{ $message }}</span>
            @enderror
        </div>
        <br/>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection