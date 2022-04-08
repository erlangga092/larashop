@extends('layouts.global')

@section('title')
    Create
@endsection

@section('pageTitle')
    Create New User
@endsection

@section('content')
    <div class="col-md-8">

        {{-- session alert --}}
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('users.store') }}" class="bg-white shadow-sm p-3" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Full name"><br>
            </div>

            <div>
                <label for="name">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username"><br>
            </div>

            <div>
                <label for="name">Roles</label> <br>

                <input type="checkbox" class="form-control" name="roles[]" value="ADMIN" id="ADMIN"
                    placeholder="Full name">
                <label for="ADMIN" class="mr-2">ADMINISTRATOR</label>

                <input type="checkbox" class="form-control" name="roles[]" value="STAFF" id="STAFF"
                    placeholder="Full name">
                <label for="STAFF" class="mr-2">STAFF</label>

                <input type="checkbox" class="form-control" name="roles[]" value="CUSTOMER" id="CUSTOMER"
                    placeholder="Full name">
                <label for="CUSTOMER" class="mr-2">CUSTOMER</label>
            </div> <br>

            <div>
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Phone number">
            </div> <br>

            <div>
                <label for="address">Address</label>
                <textarea name="address" id="address" class="form-control"></textarea>
            </div> <br>

            <div>
                <label for="avatar">Avatar Image</label>
                <input type="file" class="form-control" name="avatar"><br>
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email address">
            </div> <br>

            <div>
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div> <br>

            <div>
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" class="form-control" name="password_confirmation"
                    placeholder="Konfirmasi Password">
            </div> <br>

            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
@endsection
