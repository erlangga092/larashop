@extends('layouts.global')

@section('title')
    Edit
@endsection

@section('pageTitle')
    Edit User
@endsection

@section('content')
    <div class="col-md-8">

        {{-- session alert --}}
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" class="bg-white shadow-sm p-3" method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="PUT" name="_method">

            <div>
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Full name"
                    value="{{ $user->name }}"><br>
            </div>

            <div>
                <label for="name">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username"
                    value="{{ $user->username }}" disabled><br>
            </div>

            <div>
                <label for="status">Status</label><br>

                <input type="radio" name="status" value="ACTIVE" class="form-control"
                    {{ $user->status == 'ACTIVE' ? 'checked' : '' }}>
                <label for="active">Active</label>

                <input type="radio" name="status" value="INACTIVE" class="form-control"
                    {{ $user->status == 'INACTIVE' ? 'checked' : '' }}>
                <label for="inactive">Inactive</label>
            </div><br>

            <div>
                <label for="name">Roles</label> <br>

                <input type="checkbox" class="form-control" name="roles[]" value="ADMIN" id="ADMIN" placeholder="Full name"
                    {{ in_array('ADMIN', json_decode($user->roles)) ? 'checked' : '' }}>
                <label for="ADMIN" class="mr-2">ADMINISTRATOR</label>

                <input type="checkbox" class="form-control" name="roles[]" value="STAFF" id="STAFF" placeholder="Full name"
                    {{ in_array('STAFF', json_decode($user->roles)) ? 'checked' : '' }}>
                <label for="STAFF" class="mr-2">STAFF</label>

                <input type="checkbox" class="form-control" name="roles[]" value="CUSTOMER" id="CUSTOMER"
                    placeholder="Full name" {{ in_array('CUSTOMER', json_decode($user->roles)) ? 'checked' : '' }}>
                <label for="CUSTOMER" class="mr-2">CUSTOMER</label>
            </div> <br>

            <div>
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Phone number"
                    value="{{ $user->phone }}">
            </div> <br>

            <div>
                <label for="address">Address</label>
                <textarea name="address" id="address" class="form-control">
                    {{ $user->address }}
                </textarea>
            </div> <br>

            <div>
                <label for="avatar">Avatar Image</label> <br>
                @if ($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" width="120px">
                @else
                    No Avatar
                @endif
                <br> <br>
                <input type="file" class="form-control" name="avatar">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>
            </div> <br>

            <div>
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email address" disabled
                    value="{{ $user->email }}">
            </div> <br>

            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
@endsection
