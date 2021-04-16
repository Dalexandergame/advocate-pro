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
      <form class="form-inline">
        <input class="form-control mr-sm-2" id="search" type="text" placeholder="Chercher" aria-label="Search">
      <button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit"><img src="img/search.svg"></button>
    </form>
    </div>
    <!-- Left elements -->

    <!-- Right elements -->
    <ul class="navbar-nav flex-row ml-auto ">

      <li class="nav-item me-3 me-lg-1">
        <a class="nav-link d-sm-flex align-items-sm-center" href="#">
          <img src="img/mail.svg"/>
        </a>
      </li>

      <li class="nav-item me-3 me-lg-1">
        <a class="nav-link d-sm-flex align-items-sm-center" href="#">
          <img src="img/calendrier.svg"/>
        </a>
      </li>

      <li class="nav-item me-3 me-lg-1">
        <a class="nav-link d-sm-flex align-items-sm-center" href="#">
          <img src="img/notification.svg"/>
        </a>
      </li>

     <li class="nav-item me-3 me-lg-1">
        <a class="nav-link d-sm-flex align-items-sm-center" href="#">
          <img src="img/profile.svg"/>
        </a>
      </li>


    </ul>
    <!-- Right elements -->
  </div>
</nav>
<!-- Navbar -->

<style type="text/css">
 i> a {
  font-family: Gotham;
  font-style: normal;
  font-weight: bold;
  font-size: 15px;
  line-height: 17px;
  color: #000000;
}
 li> a {
 width: 74px;
 height: 74px;
}
.btn {
  background-color:#000000;
}
nav> div{
  display: inline-flex;
}
#search {
  width: 400px;
}
 @media only screen and (max-width: 1036px) {
    .container-fluid{
        display: block;
    }
     #search {
         width: 193px;
     }
    li> a {
        width: 60px;
    }

}
</style>
