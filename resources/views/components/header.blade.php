
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="">Company name</a>
  <button class="navbar-toggler  d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search" id="search">


  <div class="navbar-nav">
  </div>

  <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  {{ Auth::user()->name }}   
  </button>

  <ul class="dropdown-menu">
    <!-- <li><a class="dropdown-item" href="{{route('home')}}">Profile</a></li> -->

    <li class="dropdown-item">
      <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">              
                       <div class="text-decoration-none text-black">
                       LogOut </div>
 
                    </x-responsive-nav-link>
                </form>
                  </li>
  </ul>
 
</div>




</header>
