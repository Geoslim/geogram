@extends('layouts.app')

@section('content')
<div class="container" style="width:50%;">
    <div class="row">
        <div class="col-7">
            <img src="{{ asset('storage/'.$post->post_image )}}" alt="" class="w-100">
        </div>

        <div class="col-5">
            {{-- <img class="p-4 rounded-circle" style="width:40px; height:40px;" src="https://scontent-los2-1.cdninstagram.com/vp/54ee2b2dd77e82d1cb51eada6a1083dd/5E7F7C54/t51.2885-19/s150x150/66843258_400575213914337_2852447485337534464_n.jpg?_nc_ht=scontent-los2-1.cdninstagram.com"> --}}
            <h4>{{ $post->user->username }}</h4>

            <p>{{ $post->caption }}</p>
        </div>
        
    </div>
</div>
@endsection
