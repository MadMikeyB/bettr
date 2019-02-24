<footer class="footer">
    <div class="footer__flex-container">
        <div data-grid-columns="3">
            <div class="footer__col">
                <p><strong>Bettr.</strong></p>
                <ul>
                    @auth
                    <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
                    <li><a href="{{route('static.how-it-works')}}">How It Works</a></li>
                    @else
                    <li><a href="{{route('login')}}">Log In</a></li>
                    <li><a href="{{route('register')}}">Join Free</a></li>
                    @endauth
                </ul>
            </div>
            <div class="footer__col">
                {{-- <p><strong>Another</strong></p> --}}
            </div>
            <div class="footer__col">
                <p><strong>Legal</strong></p>
                <ul>
                    <li><a href="{{ route('static.privacy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('static.terms') }}">Terms &amp; Conditions</a></li>
                    <li>&copy; {{date('Y')}} &mdash; An Imperfect Product</li>
                </ul>
            </div>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</footer>
