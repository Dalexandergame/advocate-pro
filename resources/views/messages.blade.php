@extends('layouts.app')
@section('content')
<div class="container-xl">
    <div class="main__body">
<!-- Sidebar Starts -->
    <div class="sidebar sbmail">
        <div class="pg-contain">
         <br>
          <ul class="pagination d-flex justify-content-center pt-3">
            <li class="pl-3">
                <a href="#"> <img src="img/searchblack.svg"></a>
            </li>
            <li class="pl-5">
                <a href="#"><img src="img/previous.svg"/></a>
            </li>
            <li class="pl-3"><a style="color:#6c757d" href="#">1-10</a></li>
            <li class="pl-3">
                <a href="#"><img src="img/next.svg"/></a>
            </li>
            <li class="pl-5">
                <a href="#"><img src="img/reload.svg"></a>
            </li>
          </ul> 
        </div>     
    
        <div>
            <button class="button button1"><img src="img/plus.svg"> Nouveau message</button>
        </div>

        <div class="sidebarOption">
                <img src="img/profilemail.svg">
                <p class="profinfos">
                <span class="fullname">Babanou Oumaima</span>
                <br>
                <span class="adrmail">nom&prénom@gmail.com</span>
                </p>
                <span class="mtime">18:16</span>
                <p class="descmail">Lorem ipsum dolor sit amet, consectetur adipiscing elit ...</p>
                <img class="mailpin" src="img/mailpin.svg">
        </div>

        <div class="sidebarOption">
          <img src="img/profilemail.svg">
                <p class="profinfos">
                <span class="fullname">Babanou Oumaima</span>
                <br>
                <span class="adrmail">nom&prénom@gmail.com</span>
                </p>
                <span class="mtime">18:16</span>
                <p class="descmail">Lorem ipsum dolor sit amet, consectetur adipiscing elit ...</p>
                <img class="mailpin" src="img/mailpin.svg">
        </div>

        <div class="sidebarOption">
          <img src="img/profilemail.svg">
                <p class="profinfos">
                <span class="fullname">Babanou Oumaima</span>
                <br>
                <span class="adrmail">nom&prénom@gmail.com</span>
                </p>
                <span class="mtime">18:16</span>
                <p class="descmail">Lorem ipsum dolor sit amet, consectetur adipiscing elit ...</p>
                <img class="mailpin" src="img/mailpin.svg">
        </div>

        <div class="sidebarOption">
          <img src="img/profilemail.svg">
                <p class="profinfos">
                <span class="fullname">Babanou Oumaima</span>
                <br>
                <span class="adrmail">nom&prénom@gmail.com</span>
                </p>
                <span class="mtime">18:16</span>
                <p class="descmail">Lorem ipsum dolor sit amet, consectetur adipiscing elit ...</p>
                <img class="mailpin" src="img/mailpin.svg">
        </div>

        <div class="sidebarOption">
          <img src="img/profilemail.svg">
                <p class="profinfos">
                <span class="fullname">Babanou Oumaima</span>
                <br>
                <span class="adrmail">nom&prénom@gmail.com</span>
                </p>
                <span class="mtime">18:16</span>
                <p class="descmail">Lorem ipsum dolor sit amet, consectetur adipiscing elit ...</p>
                <img class="mailpin" src="img/mailpin.svg">
        </div>

        <div class="sidebarOption">
          <img src="img/profilemail.svg">
                <p class="profinfos">
                <span class="fullname">Babanou Oumaima</span>
                <br>
                <span class="adrmail">nom&prénom@gmail.com</span>
                </p>
                <span class="mtime">18:16</span>
                <p class="descmail">Lorem ipsum dolor sit amet, consectetur adipiscing elit ...</p>
                <img class="mailpin" src="img/mailpin.svg">
        </div>
      </div>
<!-- Sidebar ends -->

<!-- Section Starts -->

    <div class="emailList">
        <div class="emailList__sections">
         
          <div class="section section__selected">
            <img src="img/inbox.svg">
            <h4 style="color: white;">Boite de reception</h4>
          </div>

          <div class="section">
            <img src="img/envoi.svg">
            <h4>Envoyes</h4>
          </div>

          <div class="section">
            <img src="img/brouillon.svg">
            <h4>Brouillon</h4>
          </div>

          <div class="section">
            <img src="img/trashmail.svg">
            <h4>Dechets</h4>
          </div>

          <div class="section">
            <img src="img/favoris.svg">
            <h4>Favoris</h4>
          </div>

        </div>

        <div class="bodyinfos">
                <img src="img/profilemail.svg">
                <p class="profinfos" style="color: black; margin-left: 15px;">
                <span class="fullname">Babanou Oumaima</span>
                <br>
                <span class="adrmail">nom&prénom@gmail.com</span>
                </p>
                <span class="mtime">18:16 PM</span>
                <span class="mtime">20 November, 2020</span>
                <div class="emailList__settings">
                    <img src="img/share.svg">
                    <img src="img/favoris.svg">
                    <img src="img/darktrash.svg">
                </div>
                <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
                <br>
                <p class="mailtext">Hi dear,
                <br><br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                <br><br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                <br><br>
                Your Sincerely,
                <br>
                Nom prénom
                </p>

                <div class="pdf-block">
                     <img src="img/pdflogo.svg">
                     <p>
                        <span  class="nompdf">Nom du pdf.pdf</span>
                        <br>
                        <span  class="sizepdf">256 Mo</span>       
                        <img src="img/loadpdf.svg">
                     </p>
                </div>

                <br>
                <br>
                <br>

                <div class="answer p-4 col col-md-offset-4">
                    <div class="form-group">
                     <input type="text" class="form-control" placeholder="Click here to Reply or Forwards" style="background-color: #FAFAFA;">
                    </div>
                    <div class="d-flex justify-content-end form-group">
                     <button class="button button2" id="submit"><img src="img/send.svg"> Envoyer</button>
                    </div>
                </div>

        </div>
    </div>
    <!-- Section Ends -->

</div>
      
<br>
<br>
<br>


  </div>

@endsection  

@section('styles')
<link href="{{ asset('css/messages.css') }}" rel="stylesheet">
@endsection