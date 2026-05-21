@extends('layout.master')
@section('content')
    <form method="post" action="{{ route('users.update', $crud->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">First Name:</label><br><br>
            <input type="text" class="formcontrol" name="first_name" value="{{ $crud->first_name }}"><br><br>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label><br><br>
            <input type="text" class="formcontrol" name="last_name" value="{{ $crud->last_name }}"><br><br>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label><br><br>
            <input type="text" class="formcontrol" name="gender" value="{{ $crud->gender }}"><br><br>
        </div>
        <div class="form-group">
            <label for="qualification">Qualifications:</label><br><br>
            <input type="text" class="formcontrol" name="qualification" value="{{ $crud->qualification }}"><br><br>
        </div>
        <br/>
        <button type="submit" class="btn-btn">Update</button>
    </form>
@endsection 