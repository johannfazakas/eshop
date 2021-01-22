<div>
    <ul>
        <li><a href="{{ route('shop.home') }}">Home</a></li>
        @if(Auth::guest())
        <li><a href="{{ route('login') }}">Log in</a></li>
        <li><a href="{{ route('register') }}">Sign up</a></li>
        @else
        <li><a href="{{ route('shop.products') }}">Products</a></li>
        <li><a href="{{ route('shop.cart') }}">Cart</a></li>
        <li><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        <li><a href="{{ route('shop.orders') }}">Orders</a></li>
        @endif
    </ul>
</div>
