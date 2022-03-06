@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
        <div class="row pb-5">
            <div class="col-6">
                <a href="/post/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" alt="image" class="w-100">
                </a>
            </div>
            <div class="col-6">
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

                        @guest
                            <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                        @else
                            @if(Auth::user()->id != $post->user->id)
                                <p class="ps-3">&#9679</p>
                                <follow-button user-id="{{ $post->user->id }}" follows="{{ Auth::user()->following->contains($post->user->id) }}"></follow-button>
                            @endif
                        @endguest

                    </div>
                </div>

                <hr>

                <div class="d-flex align-items-center">
                    <div style="padding-right: 10px">
                        <a href="/profile/{{ $post->user->id }}">
                            <img src="{{ $post->user->profile->profileImage() }}" alt="avatar" style="max-height: 40px" class="rounded-circle">
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
    @endforeach
</div>
@endsection
