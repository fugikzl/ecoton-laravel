@extends('layouts.main')
@section("content")
<style>
    $qw-max-widths: (
  sm: 100vw,
  md: 100vw,
  lg: 60vw,
  xl: 60vw,
  xxl: 1320px
);
$lba-max-widths: (
  sm: 100vw,
  md: 100vw,
  lg: 60vw,
  xl: 60vw,
  xxl: 1320px
);

</style>
<div class="qw " style="margin-top:20px;" >

    <div class="card-body d-flex flex-column justify-content-center" style="align-items: center;">
      <h3 class="card-title">Про компанию</h3> 
      
      <p class="card-text justify-self-center lba" style="white-space: pre-line; max-width:80%; padding:10px; font-size:1.1em;">
        @foreach ($about as $aboba)
       {{ $aboba->content }}
        @endforeach </p>
    </div>
  </div>
@endsection