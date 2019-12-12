@extends('layouts.app')

@section('content')
<div class="container" style="width:50%;">
    <form method="post" action="{{ url('p') }}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label">Post Caption</label>
                            <textarea id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}"  autocomplete="caption"></textarea>
        
                            @error('caption')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="form-group row">
                        <label for="post-image" class="col-md-4 col-form-label">Post Image</label>
                        <input id="post-image" type="file" class="form-control-file" name="post_image">

                            @if ($errors->has('post_image'))
                                    <strong>{{ $errors->first('post_image') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
            </div>
            @csrf
            <div class="row pt-4">
                <div class="col-8 offset-2">
                    <div class="form-group row">
                       <button class="btn btn-secondary">Add Post</button>
                    </div>
                </div>
            </div>
    </form>
</div>
@endsection
