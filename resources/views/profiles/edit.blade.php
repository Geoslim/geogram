@extends('layouts.app')

@section('content')
<div class="container" style="width:50%;">
        
    <div class="row">
            <h4 class="text-center">Edit Profile</h4>
        <form method="post" action="{{ url('profile/'.$user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-8 offset-2">
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label">Title</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}"  autocomplete="title">
            
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-8 offset-2">
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label">Description</label>
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}"  autocomplete="description">
            
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-8 offset-2">
                        <div class="form-group row">
                            <label for="url" class="col-md-4 col-form-label">URL</label>
                                <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}"  autocomplete="url">
            
                                @error('url')
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
                            <label for="profile_image" class="col-md-4 col-form-label">Profile Image</label>
                            <input id="profile_image" type="file" class="form-control-file" name="profile_image">
    
                                @if ($errors->has('profile_image'))
                                        <strong>{{ $errors->first('profile_image') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                </div>
                
                <div class="row pt-4">
                    <div class="col-8 offset-2">
                        <div class="form-group row">
                            <button class="btn btn-secondary">Save Profile</button>
                        </div>
                    </div>
                </div>
        </form>

  
    </div>
</div>
@endsection
