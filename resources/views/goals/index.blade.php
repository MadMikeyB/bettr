@extends('layouts.master')

@section('content')

@hero(['title' => 'All Goals'])
    @auth
        <a href="{{route('goals.create')}}" class="hero__button">Create your goal!</a>
    @endauth
@endhero

<div class="website">
    <div class="website__flex-container">
        <goals-index></goals-index>
    </div>
</div>
@endsection
