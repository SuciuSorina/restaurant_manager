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
      <li class="nav-item {{ (\Request::path() == 'books') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('books') }}">Books</a>
      </li>
      <li class="nav-item {{ (\Request::path() == 'customers') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('customers') }}" >Customer</a>
      </li>
      @if(Auth::user())   
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
  </div>
</nav>