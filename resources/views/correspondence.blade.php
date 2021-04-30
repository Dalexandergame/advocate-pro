@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/correspondence.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="temp row">
            <div class="templates p-4 col col-md-offset-4">
                <h5 class="py-1 pr-3 font-weight-bold">Ajouter template</h5>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tapez votre texte ici ..."">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="#Tags">
                </div>
                <div>
                    <button class="vis-btn btn-dark">
                        <img src="img/eye2.png" height="13" width="13"/>
                        <span class="pl-2">visualiser</span>
                    </button>
                    <textarea id="editor" cols="63" rows="10" placeholder="Tapez votre texte ici ..."></textarea>
                </div>
                <div class="d-flex justify-content-end form-group">
                    <button class="Enr-button" id="submit">Enregistrer</button>
                </div>
            </div>
            <div class="templates col col-md-offset-4">
                <h5 class="py-2 font-weight-bold">Templates</h5>
                <div class="container">
                    <div class="row row1 px-1 bg-white">
                        <div class="col-1 pr-3">#</div>
                        <div class="col-6 pr-3">Titre</div>
                        <div class="col-3 pr-3">Date</div>
                        <div class="col-2 pr-3">Action</div>
                    </div>
                    <div class="row py-3">
                        <div class="col-1"><span>36</span></div>
                        <div class="col-6"><span class="font-weight-bold">Lorem ipsum dolor sit amet.</span></div>
                        <div class="col-3"><span>10.08.2020</span></div>
                        <div class="col-2"><span class="text-danger">Editer</span></div>
                    </div>
                    <div class="row py-3">
                        <div class="col-1"><span>37</span></div>
                        <div class="col-6"><span class="font-weight-bold">Lorem ipsum dolor sit amet.</span></div>
                        <div class="col-3"><span>10.08.2020</span></div>
                        <div class="col-2"><span class="text-danger">Editer</span></div>
                    </div>
                    <div class="row py-3">
                        <div class="col-1"><span>38</span></div>
                        <div class="col-6"><span class="font-weight-bold">Lorem ipsum dolor sit amet.</span></div>
                        <div class="col-3"><span>10.08.2020</span></div>
                        <div class="col-2"><span class="text-danger">Editer</span></div>
                    </div>
                    <div class="row py-3">
                        <div class="col-1"><span>39</span></div>
                        <div class="col-6"><span class="font-weight-bold">Lorem ipsum dolor sit amet.</span></div>
                        <div class="col-3"><span>10.08.2020</span></div>
                        <div class="col-2"><span class="text-danger">Editer</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.ckeditor.com/4.16.0/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
@endsection
