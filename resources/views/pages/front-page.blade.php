@extends('layouts.master')

@section('content')

    @hero(['title' => 'Bettr.', 'subtitle' => 'Set Targets. Smash Goals.'])
        @auth
        
        @else
            <a href="{{route('register')}}" class="hero__button">Get Involved Today!</a>
        @endauth
    @endhero

    <section class="website">
        <div class="website__flex-container">
            <div class="box">
                <h2 class="box__title">It's as easy as one, two, three.</h2>
                <div class="box__content">
                    <div data-grid-columns="3">
                        <div class="icon-box">
                            <div class="icon-box__icon">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <p class="icon-box__title"><strong>Set a goal</strong></p>
                            <p>Start by setting yourself a goal. This can be as simple as "Read a book per month", or as difficult as "Learn a new language".</p>
                            <p>Having trouble thinking of a goal? Check out our <a href="{{route('goals.index')}}">Goal Suggestions</a>!</p>
                        </div>
                        <div class="icon-box">
                            <div class="icon-box__icon">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <p class="icon-box__title"><strong>Set some targets</strong></p>
                            <p>Now you've got your sights set on a goal, you need to break it down into its component parts, we call these targets.</p> 
                            <p>For example, for "Read a book per month" goal, you could list the 12 books you wish to read this year as 12 separate targets.</p>
                        </div>
                        <div class="icon-box">
                            <div class="icon-box__icon">
                                <i class="fas fa-tasks"></i>
                            </div>
                            <p class="icon-box__title"><strong>Track your progress</strong></p>
                            <p>Bettr allows you to set completion dates on your targets and we'll send you a friendly reminder when one of your targets is due.</p>
                            <p>This helps you to easily keep on top of those targets. Don't worry, you can also postpone a target if you've not managed to achieve it yet.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box">
                <h2 class="box__title">Community features which you'll love.</h2>
                <div class="box__content">
                    <div data-grid-columns="3">
                        <div class="icon-box">
                            <div class="icon-box__icon">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <p class="icon-box__title"><strong>Unlock trophies</strong></p>
                            <p>The more you use Bettr, the more trophies you will unlock. These trophies will be displayed in pride of place on your profile and on your public goals.</p>
                            <p>Glory hunter? <a href="{{route('static.trophies')}}">Check out the full list of trophies available to be unlocked here</a>.</p>
                        </div>
                       <div class="icon-box">
                            <div class="icon-box__icon">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <p class="icon-box__title"><strong>Collaborate with your friends</strong></p>
                            <p>Your friends can join in on your goals by remixing them, and taking them on themselves.</p>
                            <p>They can set their own targets, and you can share your journeys through your goals with your friends.</p>
                        </div>
                       <div class="icon-box">
                            <div class="icon-box__icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <p class="icon-box__title"><strong>Bettr yourself</strong></p>
                            <p>The more you use Bettr, the more Bettr works for you. We're all about bettering yourself, hence the name!</p>
                            <p>Curious? <a href="">Find out more about Bettr by clicking here</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
