@extends('layouts.master')
@push('styles-before')
<title>Trophy Cabinet - Bettr.</title>
@endpush
@section('content')
    @hero(['title' => 'Trophy Cabinet', 'subtitle' => 'Glory Hunters! This page is for you.'])

    @endhero

    <div class="website">
        <div class="website__flex-container">
            <div class="box">
                <h1 class="box__title">The trophy system is coming soon.</h1>
                <div class="box__content">
                    <div style="opacity:0.8;pointer-events: none;filter: blur(6px);-webkit-filter: blur(6px);">
                        <div data-grid-columns="3">
                            @for ($i = 0; $i < 12; $i++)
                            <div class="icon-box">
                                <div class="icon-box__icon">
                                    <i class="fas fa-trophy"></i>
                                </div>
                                <p class="icon-box__title"><strong>{{str_random()}}</strong></p>
                                <p>{{str_random()}} {{str_random()}} {{str_random()}} {{str_random()}}</p>
                                <p>What did you expect to find? :)</p>
                                <p><a href="#" class="button">{{str_random()}}</a></p>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
