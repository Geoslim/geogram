@extends('layouts.app')

@section('content')
<div class="container" style="width:50%;">
    <div class="row">
        <div class="col-8">
            <img src="{{ asset('storage/'.$post->post_image )}}" alt="" class="w-100">
        </div>

        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">

                    <div class="pr-3">
                        <img class="rounded-circle w-100" style="max-width:45px;" src="{{ $user->profile->profileImage() }}">
            
                    </div>
                    <div class="font-weight-bold">
                        <a href="{{ url('profile/'.$post->user->id) }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                        <span>|</span>
                        <a href="" class="">Follow</a>
                    </div>
                </div>
                <hr>
                <div>
                    <span class="font-weight-bold">
                        <a href="{{ url('profile/'.$post->user->id) }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </span>
                     {{ $post->caption }}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
