<header class="header">
    <div class="header__flex-container">
        <div class="header__logo">
            <p><a href="{{route('home')}}">Bettr.</a></p>
        </div>
        <nav class="header__navigation">
            <ul class="menu">
                @auth
                    {{-- @if (auth()->user()->goals->count() < 1)
                        <li class="menu__item"><a href="#" class="menu__link">Goal Suggestions</a></li>
                    @endif --}}
                    <li class="menu__item"><a href="{{route('goals.index')}}" class="menu__link">All Goals</a></li>
                    <li class="menu__item"><a href="{{route('profiles.show', auth()->user())}}" class="menu__link">{{auth()->user()->name}}</a></li>
                    <li class="menu__item"><a href="{{route('goals.create')}}" class="menu__link menu__button">Create your Goal!</a></li>

                @else
                    <li class="menu__item"><a href="{{route('login')}}" class="menu__link">Log In</a></li>
                    <li class="menu__item"><a href="" class="menu__link">How It Works</a></li>
                    <li class="menu__item"><a href="{{route('register')}}" class="menu__link menu__button">Join Free</a></li>
                @endauth
            </ul>
        </nav>
    </div>
</header>
