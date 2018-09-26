<nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top" style="background-color: #28e3ed;"> 
    <a class="navbar-brand" id="logo" href="{{ url('/') }}">
        {{ config('app.name', 'Pâtisserie') }}
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    {{-- left side of navbar --}}
      @auth
        <ul class="navbar-nav mr-auto" id="toplink">
          {{-- <li class="nav-item">
            <a class="nav-link" href="/home">My Posts</a>
          </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
            </li>
            @foreach (\App\Category::all() as $category)
                <li class="nav-item">
                    <a class="nav-link" href="/posts/category/{{ $category->id }}">{{ $category->name }}</a>
                </li>
            @endforeach
          {{-- <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li> --}}
        </ul>
      @endauth
    {{-- right side of navbar --}}
    <ul class="navbar-nav">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item" id="toplink1">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item" id="toplink2">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
        @else
            <li class="nav-item" id="toplink3">
                <a class="nav-link" href="/home">My Profile</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="/home">My Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/home">My Images</a>
            </li> --}}
            <li class="nav-item" id="toplink4">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        @endguest
    </ul>
  </div>
</nav>

<script type="text/javascript">
    
    $('button.navbar-toggler').click( ()=>{
        $('#navbarSupportedContent').toggle();
    });

</script>