<!-- Navbar header-->
{{--<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <ul class="nav navbar-nav ml-auto">
      <select class="p-2 rounded" data-width="fit">
        <option data-content='<span class="flag-icon flag-icon-us"></span> French'>French</option>
        <option  data-content='<span class="flag-icon flag-icon-mx"></span> Arabic'>Arabic</option>
      </select>
    </ul>
  </div>
</nav>--}}



<!-- Navbar-->
{{--<nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <div class="container-fluid justify-content-between px-2">

    <!-- Left elements -->
    <div class="d-flex mx-4">
      <!-- Search form -->
      <form class="form-inline" type="get" action="{{ url('./documents/search') }}">
        <input class="form-control mr-sm-2" id="search" name="query" type="search" placeholder="Chercher" aria-label="Search">
        <button class="btn btn-outline-white btn-md my-2 my-sm-0" type="submit"><img src="{{url('img/search.svg')}}"></button>
    </form>
    </div>
    <!-- Left elements -->

    <!-- Right elements -->
    <ul class="navbar-nav flex-row ml-auto ">

      <li class="nav-item me-3 me-lg-1">
        <a class="nav-link d-sm-flex align-items-sm-center" href="{{ url('messages') }}">
          <img src="{{url('img/mail.svg')}}"/>
        </a>
      </li>

      <li class="nav-item me-3 me-lg-1">
        <a class="nav-link d-sm-flex align-items-sm-center" href="{{ url('calendrier') }}">
          <img src="{{url('img/calendrier.svg')}}"/>
        </a>
      </li>

      <li class="nav-item me-3 me-lg-1">
        <a class="nav-link d-sm-flex align-items-sm-center" href="{{ url('taches') }}">
          <img src="{{url('img/notification.svg')}}"/>
        </a>
      </li>

     <li class="nav-item me-3 me-lg-1">
        <a class="nav-link d-sm-flex align-items-sm-center" href="{{ url('profile') }}">
          <img src="{{url('img/profile.svg')}}"/>
        </a>
      </li>


    </ul>
    <!-- Right elements -->
  </div>
</nav>--}}
<!-- Navbar -->
<div class="sticky top-0 z-10 flex h-20 flex-shrink-0 bg-white shadow">
  <button type="button" class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
    <span class="sr-only">Open sidebar</span>
    <!-- Heroicon name: outline/bars-3-bottom-left -->
    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
    </svg>
  </button>
  <div class="flex flex-1 justify-between px-4">
    <div class="flex flex-1">
      <form class="flex w-full md:ml-0" action="#" method="GET">
        <label for="search-field" class="sr-only">Search</label>
        <div class="relative w-full text-gray-400 focus-within:text-gray-600">
          <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center">
            <!-- Heroicon name: mini/magnifying-glass -->
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
            </svg>
          </div>
          <input id="search-field" class="block h-full w-full border-transparent py-2 pl-8 pr-3 text-gray-900 placeholder-gray-500 focus:border-transparent focus:placeholder-gray-400 focus:outline-none focus:ring-0 sm:text-sm" placeholder="Search" type="search" name="search">
        </div>
      </form>
    </div>
    <div class="ml-4 flex items-center md:ml-6">
      <button type="button" class="rounded-full w-12 bg-white p-2 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        <span class="sr-only">View notifications</span>
        <!-- Heroicon name: outline/bell -->
        <img src="{{url('img/mail.svg')}}"/>
      </button>
      <button type="button" class="rounded-full w-10 bg-white p-2 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        <span class="sr-only">View notifications</span>
        <!-- Heroicon name: outline/bell -->
        <img src="{{url('img/calendrier.svg')}}"/>
      </button>
      <button type="button" class="rounded-full w-10 bg-white p-2 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        <span class="sr-only">View notifications</span>
        <!-- Heroicon name: outline/bell -->
        <img src="{{url('img/notification.svg')}}"/>
      </button>

      <!-- Profile dropdown -->
      <div class="relative ml-3">
        <div>
          <button type="button" class="flex w-12 items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
            <span class="sr-only">Open user menu</span>
            <img src="{{url('img/profile.svg')}}"/>
          </button>
        </div>

        <!--
          Dropdown menu, show/hide based on menu state.

          Entering: "transition ease-out duration-100"
            From: "transform opacity-0 scale-95"
            To: "transform opacity-100 scale-100"
          Leaving: "transition ease-in duration-75"
            From: "transform opacity-100 scale-100"
            To: "transform opacity-0 scale-95"
        -->
        {{--<div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
          <!-- Active: "bg-gray-100", Not Active: "" -->
          <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

          <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>

          <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>--}}
        </div>
      </div>
    </div>
</div>

