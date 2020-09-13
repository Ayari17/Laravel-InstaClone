@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="/p" method="post" enctype="multipart/form-data">
            @csrf

        <div class="row">
            <div class="col-8 offset-2">
                <h2>Add New Post</h2>
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label ">Post Caption</label>


                        <input id="caption" type="text"
                               class="form-control
                                @error('caption') is-invalid @enderror"
                               name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>

                        @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                </div>

                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label ">Post Image</label>
                    <input id="image"  name="image" type="file" class="form-control-file" >

                    @error('image')

                    <span class="text-muted" >{{ $message }}</span>

                    @enderror
                </div>

                <div class="row  pt-4">
                    <button class="btn btn-primary">New Post</button>
                </div>

            </div>
        </div>

        </form>

    </div>

@endsection
