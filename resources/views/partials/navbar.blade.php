<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <label class="navbar-brand" >My Learning app</label>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item {{ (\Request::path() == 'products') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('products') }}">Products</a>
      </li>
      <li class="nav-item {{ (\Request::path() == 'categories') ? 'active' : '' }} ">
        <a class="nav-link"  href="{{ url('categories') }}">Categories</a>
      </li>
      @if(Auth::user() && Auth::user()->role == 'ADMIN' )
        <li class="nav-item {{ (\Request::path() == 'customers') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('customers') }}" >Customers</a>
        </li>
      @endif
      @if(Auth::user())
        <li class="nav-item {{ (\Request::path() == 'orders') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('orders') }}" >Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
      @endif
    </ul>
    @if(Auth::user() && (Auth::user()->role == 'CUSTOMER') )
      <ul class="navbar-nav  ml-auto">
        <li class=" nav-item {{ (\Request::path() == 'order-items') ? 'active' : '' }}">
          <a class="btn btn-danger" href="{{ url('order-items') }}" ><span class="oi oi-cart"></span>My Cart</a>
        </li>
      </ul>
    @endif
  </div>
</nav>
