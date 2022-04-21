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
<h2 style="align-self: center">Блог</h2>

    @foreach ($posts as $post)
    <div class="card " style="margin-top:20px;" >
      <div>
  
      </div>
    <div class="card-body">
      <h4 class="card-title">{{$post->title}}</h4>
      <p style="opacity:0.6; font-size:0.8em" >{{$post->created_at}}</p>
      <p style="opacity:0.9" class="card-text">{{$post->content}} </p> 
      </div>
  </div>
  <br>

    @endforeach
    <div>
      {{$posts->links()}}
    </div>
   
@endsection