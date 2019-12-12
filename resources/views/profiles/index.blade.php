@extends('layouts.app')

@section('content')
<div class="container" style="width:70%;">
    <div class="row">
        <div class="col-3">
            <img class="p-4 rounded-circle w-100" src="{{ $user->profile->profileImage() }}" style="background-color:#aaa;">
        </div>
        <div class="col-9  p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class=""><h3>{{ $user->username }}</h3></div>
                <a class="btn btn-secondary btn-sm">Follow</a>
                @can('update', $user->profile)
                <a href="{{ url('p/create') }}" class="btn btn-secondary btn-sm">Add New Post</a>
                @endcan
            </div>
            
            @can('update', $user->profile)
                <a href="{{ url('profile/'.$user->id.'/edit') }}" class="">Edit Profile</a>
            @endcan
                
            <div class="d-flex pt-1">
                <div class="pr-3"><strong>{{ $user->posts->count() }}</strong> Posts</div>
                <div class="pr-3"><strong>332</strong> Followers</div>
                <div class=""><strong>132</strong> Following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div>{{$user->profile->description}}</div>
            @if(!empty($user->profile->url))
            <a href="{{ url($user->profile->url)}}" class="font-weight-bold text-dark">{{$user->profile->url}}</a>
            @else
            <a href="" class="font-weight-bold"></a>
            @endif
        </div>
        <div class="row">
            @foreach ($user->posts as $post)
            <div class="col-4 pt-4">
                <a href="{{ url('p/'.$post->id) }}"><img class="w-100" src="../storage/{{ $post->post_image }}"></a>
            </div>
           @endforeach
        </div>
    </div>
</div>
@endsection
