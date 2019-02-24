@extends('layouts.master')

@push('styles-before')
<title>How it works - Bettr.</title>
@endpush

@section('content')
    @hero(['title' => 'How it Works'])

    @endhero

    <div class="website">
        <div class="website__flex-container">
            <div class="box">
                <h1 class="box__title">How Bettr. Works for you.</h1>
                <div class="box__content">
                    <p>For Bettr. to really work for you, you need to start out with a goal in mind.</p>
                    <p>This can be as simple as "Read more books" to as complicated as "Learn a new language".</p>
                    <p>Once you have a goal in mind, you can then start to break it down into it's component parts. We call these "Targets".</p>
                    <p>You can set "complete by" dates on your targets using Bettr, and we'll send you a handy email when you're near to that date.</p>
                    <p>It really is as simple as 1,2,3.</p>

                    <p><strong>Example:</strong></p>

                    <div data-grid-columns="3">
                        <div class="card">
                            <div class="card__body">
                                <div class="icon-box">
                                    <div class="icon-box__icon">
                                        <i class="fas fa-lightbulb"></i>
                                    </div>
                                    <strong class="icon-box__title">Goal: Learn to play the Piano</strong>
                                    <p>This is what we'd consider one of the harder goals which you could attempt, and as such it's probably going to need to be broken down.</p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card__body">
                                <div class="icon-box">
                                    <div class="icon-box__icon">
                                        <i class="fas fa-bullseye"></i>
                                    </div>
                                    <strong class="icon-box__title">Targets: Learn Scales</strong>
                                    <p>One way we could break down how to learn to play the Piano is by first learning the scales. Don't stop until you know what a perfect fifth is!</p>
                                    <p>Another way you could break your goal down, is to break it down into songs you'd like to learn to play on the Piano, ticking them off as you go.</p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card__body">
                                <div class="icon-box">
                                    <div class="icon-box__icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <strong class="icon-box__title">Progress until Perfect</strong>
                                    <p>As you progress through your targets, you'll earn trophies which we'll display on your profile.</p>
                                    <p>We'll also track the progress of your targets right there on your goal.</p>
                                    <p>Your friends can leave comments on your goal, or remix it and attempt it themselves, providing you with a buddy to partner up with.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>Don't worry, if you're struggling to think of a goal, the chances are that somebody else has thought of a similar goal for you.</p>
                    <p>Head on over to our <a href="{{route('goals.index')}}">Goal Suggestions</a> page for some inspiration.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
