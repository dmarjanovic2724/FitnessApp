@extends('layouts.layout')


@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <h2 class="text-center">Edit profile:</h2>
            <div class="col-md-4">
                <form class="row g-3" action="{{ route('updateProfile') }}" method="POST">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">Name</span>
                        <input type="text" class="form-control" placeholder="" name="name" value="{{ $user->name }}">
                        <span class="input-group-text">@error('name') {{ $message }} @enderror</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Last name</span>
                        <input type="text" class="form-control" placeholder="" name="lastName"
                            value="{{ $user->lastName }}">
                        <span class="input-group-text">@error('lastName') {{ $message }} @enderror</span>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Old Password</span>
                        <input type="password" class="form-control" placeholder="" name="password">
                        <span class="input-group-text">@error('password') {{ $message }} @enderror</span>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">New-Password</span>
                        <input type="password" class="form-control" placeholder="" name="rePassword">
                        <span class="input-group-text">@error('rePassword') {{ $message }} @enderror</span>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Re type new password</span>
                        <input type="password" class="form-control" placeholder="" name="reNewPassword">
                        <span class="input-group-text">@error('rePassword') {{ $message }} @enderror</span>
                    </div>


                    <button type="submit" class="btn btn-block btn-primary mb-3">Save</button>

                    <a href="{{ url()->previous() }}"><i class="fa fa-arrow-circle-o-left"></i><span>Back</span>
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
