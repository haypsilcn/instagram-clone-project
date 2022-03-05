@extends('layouts.app')

@section('content')
<div class="container" style="padding: 0 100px 0 100px">
    {{--<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>--}}

    <div class="row justify-content-center">
        <div class="col-3 pt-5">
            <img src="{{ $user->profile->profileImage() }}" alt="avatar" class="rounded-circle w-100">
        </div>

        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-2">
                    <div>
                        <h1>{{ $user->username }}</h1>
                    </div>

                    @guest
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @else
                        @if(Auth::user()->id != $user->id)
                            <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                        @endif
                    @endguest

                </div>


                @can('update', $user->profile)
                    <a href="/post/create">Add New Post</a>
                @endcan

            </div>

            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex pt-2">
                <div style="padding-right: 70px"><b>{{ $user->posts->count() }}</b> posts</div>
                <div style="padding-right: 70px"><b>{{ $user->profile->followers->count() }}</b> followers</div>
                <div style="padding-right: 70px"><b>{{ $user->following->count() }}</b> following</div>
            </div>
            <div class="pt-4"><b>{{ $user->profile->title ?? ''}}</b></div>
            <div>{{ $user->profile->description ?? '' }}</div>
            <div><a href="#">{{ $user->profile->url ?? ''}}</a></div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/post/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>

            </div>
        @endforeach
    </div>
</div>
@endsection
