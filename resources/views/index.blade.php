@extends('layout.master')

@section('content')

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <td>ID</td>
            <td>FIRST NAME</td>
            <td>LAST NAME</td>
            <td>GENDER</td>
            <td>QUALIFICATION</td>
            <td>ACTION</td>
        </tr>
    </thead>
    @include('flash-message')
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
        </tr>
        @endforeach
    </tbody>
</table>

@endsection