@extends('layouts.layout')

@section('content')
    .<div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">Exercise name</span>
                        <input type="text" name="name" class="form-control" placeholder="" aria-describedby="helpId">
                        <span class="input-group-text">@error('name') {{ $message }} @enderror</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Type</span>
                        <input type="text" name="type" class="form-control" placeholder="" aria-describedby="helpId">
                        <span class="input-group-text">@error('type') {{ $message }} @enderror</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Level 1</span>
                        <input type="text" name="level_1" class="form-control" placeholder="" aria-describedby="helpId">
                        <span class="input-group-text">@error('level_1') {{ $message }} @enderror</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Level 2</span>
                        <input type="text" name="level_2" class="form-control" placeholder="" aria-describedby="helpId">
                        <span class="input-group-text">@error('level_2') {{ $message }} @enderror</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Level 3</span>
                        <input type="text" name="level_3" class="form-control" placeholder="" aria-describedby="helpId">
                        <span class="input-group-text">@error('level_3') {{ $message }} @enderror</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Description</span>
                        <input type="text" name="description" class="form-control" placeholder=""
                            aria-describedby="helpId">
                        <span class="input-group-text">@error('description') {{ $message }} @enderror</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Upload image</span>
                        <input type="file" name="image" class="form-control" placeholder="" aria-describedby="helpId">
                        <span class="input-group-text">@error('image') {{ $message }} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary mb-3">Create exercise</button>
                </form>
                <a href="{{ url()->previous() }}"><i class="fa fa-arrow-circle-o-left"></i><span>Back</span>
            </div>
        </div>
    </div>
@endsection
