@extends('layouts.main')
@section("content")

<div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); align-self: center; align-items:center; width:80%; grid-column-gap: 150px;grid-row-gap: 1em;">
    <div style="width:23vw; min-width:225px; min-height:309px; height:32.5vw; background-size:cover; background-image:url('{{asset("licensesfolder/1.jpg")}}')"></div>
    <div style="width:23vw; min-width:225px; min-height:309px; height:32.5vw; background-size:cover; background-image:url('{{asset("licensesfolder/3.jpg")}}')"></div>
    <div style="width:23vw; min-width:225px; min-height:309px; height:32.5vw; background-size:cover; background-image:url('{{asset("licensesfolder/2.jpg")}}')"></div>

    <div style="width:23vw; min-width:225px; min-height:309px; height:32.5vw; background-size:cover; background-image:url('{{asset("licensesfolder/4.jpg")}}')"></div>
</div>



@endsection