@extends('layouts.main')
@section("content")
<style>
    $card-max-widths: (
  sm: 100vw,
  md: 100vw,
  lg: 60vw,
  xl: 60vw,
  xxl: 1320px
);

</style>
<script>
  function textAreaAdjust(element) {
  element.style.height = "1px";
  element.style.height = (25+element.scrollHeight)+"px";
}
</script>
<h2 style="align-self: center">Блог</h2>

    @foreach ($posts as $post)
    <div class="card " style="margin-top:20px;" id="post{{$post->id}}">
      <div>

  
      </div>
    <div class="card-body" >
      @auth
      <form method="POST" action="{{'postTitleEdit'}}"><h4 class="card-title">
        <input maxlength="63" name="title" style="width:80%"value='{{$post->title}}'>@csrf</h4>
        <input type="hidden" name="id" value="{{$post->id}}">

        <input type="submit"  value="Изменить название поста"class="btn btn-secondary"></form>
      @endauth
      @guest
      <h4 class="card-title">{{$post->title}}</h4>
      @endguest
      <p style="opacity:0.6; font-size:0.8em" >{{$post->updated_at}}</p>
      @auth
      <form action="{{'postContentEdit'}}" method="POST" >
        <input type="hidden" name="id" value="{{$post->id}}">
      <textarea maxlength="2043" onclick="textAreaAdjust(this)"  style="opacity:0.9; width:100%" class="card-text">{{$post->content}} </textarea> 
      @csrf
      <input type="submit" method="POST" class="btn btn-primary" value="Изменить текст поста">
      </form>
      @endauth
      @guest
      <p style="opacity:0.9" class="card-text">{{$post->content}} </p> 

      @endguest

      </div>
  </div>
  <br>

    @endforeach
    <div>
      {{$posts->links()}}
    </div>
   
@endsection