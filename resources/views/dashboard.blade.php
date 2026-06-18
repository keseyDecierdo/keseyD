@extends('layout.master')

@section('title', 'Dashboard')

@section('content')

<h2>Dashboard</h2>
<hr>

<a href="/insert">Add New Student</a>

<br/><br/>



<hr>

<h4>Student Records</h4>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <td>ID</td>
            <td>FIRST NAME</td>
            <td>LAST NAME</td>
            <td>GENDER</td>
            <td>QUALIFICATION</td>
            <td>ACTION</td>
            <td></td>
        </tr>
    </thead>

    <tbody>
        @foreach($cruds as $crud)
        <tr>
            <td>{{ $crud->id }}</td>
            <td>{{ $crud->first_name }}</td>
            <td>{{ $crud->last_name }}</td>
            <td>{{ $crud->gender }}</td>
            <td>{{ $crud->qualification }}</td>
            <td>
                <form action="{{ route('users.edit', $crud->id) }}" method="GET">
                    <button type="submit">Edit</button>
                </form>
            </td>
            <td>
                <form action="{{ route('users.destroy', $crud->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
