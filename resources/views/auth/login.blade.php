@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <h2 class="text-center">Login</h2>
            <div class="col-md-4">
                <form class="row g-3 needs-validation" method="POST" action="{{ route('auth.check') }}" novalidate>
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @elseif (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">Email</span>
                        <input type="text" class="form-control" placeholder="" name="email">
                        <span class="input-group-text">@error('email') {{ $message }} @enderror</span>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Password</span>
                        <input type="password" class="form-control" placeholder="" name="password">
                        <span class="input-group-text">@error('password') {{ $message }} @enderror</span>
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">Sing in</button>
                    <br>
                    <a href="{{ route('auth.registry') }}">I dont have an account, create new</a>
                </form>
            </div>
        </div>
    </div>
@endsection
