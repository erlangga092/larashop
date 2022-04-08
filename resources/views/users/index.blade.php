@extends('layouts.global')

@section('title')
    Users List
@endsection

@section('pageTitle')
    Users List
@endsection

@section('content')
    {{-- session alert --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <form action="">
                <div class="input-group mb-3">
                    <input type="text" class="form-control col-md-10">
                    <div class="input-group-append">
                        <input type="text" class="btn btn-primary" value="filter">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                Create User
            </a>
        </div>
    </div> <br>

    <table class="table">
        <thead>
            <tr>
                <th><b>#</b></th>
                <th><b>Name</b></th>
                <th><b>Username</b></th>
                <th><b>Email</b></th>
                <th><b>Status</b></th>
                <th><b>Action</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{ $user->status == 'ACTIVE' ? 'active' : 'inactive' }}
                    </td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Delete this user permanently?')">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">

                            <a class="btn btn-info text-white btn-sm" href="{{ route('users.edit', $user->id) }}">Edit</a>
                            <button class="btn btn-danger text-white btn-sm"
                                href="{{ route('users.edit', $user->id) }}">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
@endsection
