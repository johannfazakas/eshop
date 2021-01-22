<div>
    <ul>
        @if(Auth::user())
        <p>Hello, {{ Auth::user()->name }}</p>
        @endif

        <li><a href="{{ route('shop.home') }}">Home</a></li>

        @if(Auth::guest())
        <li><a href="{{ route('login') }}">Log in</a></li>
        <li><a href="{{ route('register') }}">Sign up</a></li>
        @else
        <li><a href="{{ route('shop.products') }}">Products</a></li>

        @if(!Auth::user()->is_admin)
        <li><a href="{{ route('shop.cart') }}">Cart</a></li>
        <li><a href="{{ route('shop.orders') }}">Orders</a></li>
        @endif

        <li><a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

        @endif
    </ul>
</div>
