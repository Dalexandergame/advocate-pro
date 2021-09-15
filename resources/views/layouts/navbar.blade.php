<!-- Navbar header-->
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item me-3 me-lg-1">
        <i class="nav-link">
          <a href="" style="">Fr.</a>
          <a href=""style="">Ar.</a>
        </i>
      </li>
    </ul>
  </div>
</nav>
<!-- Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <div class="container-fluid justify-content-between">

    <!-- Left elements -->
    <div class="d-flex">
      <!-- Search form -->
      <form class="form-inline" type="get" action="{{ url('./documents/search') }}">
        <input class="form-control mr-sm-2" id="search" name="query" type="search" placeholder="Chercher" aria-label="Search">
        <button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit"><img src="{{url('img/search.svg')}}"></button>
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
</nav>
<!-- Navbar -->

