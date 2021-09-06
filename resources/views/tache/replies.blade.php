
@foreach($comments as $comment)
<div class="display-comment">
 <div>
    <img class="tprof" src="{{ url('/img/profile.svg') }}"/> <span style="font-family: Gotham;font-style: normal;font-weight: bold;font-size: 14px;line-height: 15px;color: #989898;">{{ $comment->user->name }}</span> <span class="tdate">il y a {{$comment->created_at->diffForHumans()}}</span>

    <p style="font-family: Gotham;font-style: normal;font-weight: normal;font-size: 14px;line-height: 180.5%;color: #000000;margin-left: 20px;"> {{ $comment->comment }}
        <br>
    <a class="filej" href="{{ url('./comment/download', $comment->file) }}"><img src="{{ url('/img/pinfile.svg') }}"/> {{ $comment->file }}</a>
    </p>
    

 </div>

    
    {{-- <button type="button" id="formButton">Repondre</button> --}}
    <form {{-- id="form1" style="display: none;" --}} method="post" action="{{ route('reply.add') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-inline">
            <input type="hidden" name="tache_id" value="{{ $tache_id }}" />
            <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            <input type="text" class="comment" name="comment" placeholder="Ajouter une reponse" required/>
            <input type="file" name="file" id="file" class="inputfile" multiple onchange="javascript:updateList()"  />
            <label for="file" id="fileList">+ Ajouter piece jointe </label>
        
            <input type="submit" class="btnr btn-sm py-0" style="font-size: 0.8em;" value="Repondre" />
        </div>
    </form>
 <br>
 <br>    
</div>
   <div style="margin-left:30px;"> @include('tache.replies', ['comments' => $comment->replies])</div>
@endforeach
<style type="text/css">
.comment{
border: none;
border-color: transparent;
width: 250px;
 }
input::placeholder{
  font-family: Gotham;
font-style: normal;
font-weight: normal;
font-size: 12px;
line-height: 14px;
color: #737171;
opacity: 0.3;
 }
 .btnr {
 font-family: Gotham;
font-style: normal;
font-weight: normal;
font-size: 12px;
line-height: 14px;
color: white;
margin-left: 10px;
background-color: grey;
 }
</style>
@section('scripts')
<script type="text/javascript">
    updateList = function() {
  var input = document.getElementById('file');
  var output = document.getElementById('fileList');

  output.innerHTML = '<ul>';
  for (var i = 0; i < input.files.length; ++i) {
    output.innerHTML += '<li>' + input.files.item(i).name + '</li>';
  }
  output.innerHTML += '</ul>';
}
</script>
{{-- 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
  $("#formButton").click(function() {
    $("#form1").toggle();
  });
});
</script> --}}
@endsection
 
