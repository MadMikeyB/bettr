@extends('layouts.master')


@section('content')
    @hero(['title' => $user->name])
        @auth
            @if (auth()->id() === $user->id)
                <a href="{{route('profiles.edit', $user)}}" class="hero__button">Edit Your Profile</a>
            @endif
        @endauth
    @endhero

    <div class="website">
        <div class="website__flex-container">
            {{-- Goals --}}
            <user-goals :user="{{$user}}"></user-goals>
            {{-- / Goals --}}

            {{-- Trophies --}}
{{--             <div class="box">
                <h2 class="box__title">Trophy Cabinet</h2>
                <div class="box__content">
                    Some shiz here
                </div>
            </div> --}}
            {{-- / Trophies --}}

            {{-- Friends --}}
{{--             <div class="box">
                <h2 class="box__title">Friends</h2>
                <div class="box__content">
                    Some shiz here
                </div>
            </div> --}}
            {{-- / Friends --}}

            {{-- Comments --}}
{{--             <div class="box">
                <h2 class="box__title">Comments</h2>
                <div class="box__content">
                    Some shiz here
                </div>
            </div> --}}
            {{-- / Comments --}}
        </div>
    </div>
@endsection
