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
            <img src="/svg/instagram-clone-project-logo.svg" alt="avatar" class="rounded-circle">
        </div>

        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="/post/create">New Post</a>
            </div>
            <div class="d-flex">
                <div style="padding-right: 70px"><b> {{ $user->posts->count() }} </b> posts</div>
                <div style="padding-right: 70px"><b>72</b> followers</div>
                <div style="padding-right: 70px"><b>47</b> following</div>
            </div>
            <div class="pt-4"><b>{{ $user->profile->title ?? ''}}</b></div>
            <div>{{ $user->profile->description ?? '' }}</div>
            <div><a href="#">{{ $user->profile->url ?? ''}}</a></div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </div>
        @endforeach
    </div>
</div>
@endsection
