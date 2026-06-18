@extends('layout.master')
@section('content')

<form method="POST" action="{{ route('users.store') }}">
    @csrf
<div class="form-group mb-3">
<label for="first_name">First Name :</label><br/><br/>
<input type="text" name="first_name" value="{{ old('first_name') }}"/>
</div>
<div class="form-group mb-3">
<label for="last_name">Last Name :</label><br/><br/>
<input type="text" name="last_name" value="{{ old('last_name') }}"/>
</div>
<div class="form-group mb-3">
<label for="gender">Gender :</label><br/><br/>
<input type="text" name="gender" value="{{ old('gender') }}"/>
</div>
<div class="form-group mb-3">
<label for="qualification">Qualifications :</label><br/><br/>
<input type="text" name="qualification" value="{{ old('qualification') }}"/>
</div>
<br/>
<button type="submit" class="btn btn-primary">Insert</button>
</form>

@endsection