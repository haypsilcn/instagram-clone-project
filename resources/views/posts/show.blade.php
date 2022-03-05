@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" alt="image" class="w-100">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
                <div class="pe-3">
                    <a href="/profile/{{ $post->user->id }}">
                        <img src="{{ $post->user->profile->profileImage() }}" alt="avatar" style="max-height: 50px" class="rounded-circle">
                    </a>
                </div>
                <div class="d-flex align-items-center">
                    <a href="/profile/{{ $post->user->id }}" style="color: black; text-decoration: none">
                        <h4><b>{{ $post->user->username }}</b></h4>
                    </a>
                    <p class="ps-3">&#9679</p>
                    <a href="#" class="ps-3"><h5>Follow</h5></a>
                </div>
            </div>

            <hr>

            <div class="d-flex align-items-center">
                <div style="padding-right: 10px">
                    <a href="/profile/{{ $post->user->id }}">
                        <img src="/storage/{{ $post->user->profile->image }}" alt="avatar" style="max-height: 40px" class="rounded-circle">
                    </a>
                </div>
                <div style="padding-right: 10px">
                    <a href="/profile/{{ $post->user->id }}" style="color: black; text-decoration: none">
                        <h6><b>{{ $post->user->username }}</b></h6>
                    </a>
                </div>
                <div style="padding-top: 8px">
                    <p>{{ $post->caption }}</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
