@extends('layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <h2 class="text-center">Registry</h2>
        <div class="col-md-4">
            <form class="row g-3" action="{{ route('auth.save') }}" method="POST">
              @if (Session::get('fail'))
                    <div class="alert alert-danger">
                      {{ Session::get('fail') }}
                    </div>
              @endif                
              @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text">Name</span>
                    <input type="text" class="form-control" placeholder="" name="name" value="{{ old('name') }}">
                    <span class="input-group-text">@error('name') {{ $message }}  @enderror</span>
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text">Last name</span>
                    <input type="text" class="form-control" placeholder="" name="lastName"  value="{{ old('lastName') }}">
                    <span class="input-group-text">@error('lastName') {{ $message }}   @enderror</span>
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text">Email</span>
                    <input type="text" class="form-control" placeholder="" name="email"  value="{{ old('email') }}">
                    <span class="input-group-text">@error('email'){{ $message }} @enderror</span>
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text">Password</span>
                    <input type="password" class="form-control" placeholder="" name="password"  >
                    <span class="input-group-text">@error('password') {{ $message }}  @enderror</span>
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text">Retype-Password</span>
                    <input type="password" class="form-control" placeholder="" name="rePassword">
                    <span class="input-group-text">@error('rePassword') {{ $message }}   @enderror</span>
                  </div>


                  <button type="submit" class="btn btn-block btn-primary">Sing up</button>
                    <br>
                    <a href="">I allready have an account, login</a>
            </form>          
        </ul>
    </div>
        </div>
    </div>
</div>
@endsection