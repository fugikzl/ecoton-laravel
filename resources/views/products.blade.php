@extends('layouts.main')
@section("content")
<style>
input{
  margin-top:0.3vw;
}
</style>
<div class="card " style="margin-top:20px;" >

    <div class="card-body d-flex flex-column justify-content-center" >
      <h3 class="card-title" style="align-self: center;">Услуги</h3> 
        <br>  
        <ul>

          @foreach ($services as $service)
          @auth
          <form method="POST" action="{{'changeService'}}">
          @csrf
          <input name="id" type="hidden" value="{{$service->id}}">
          <input name="name" style="font-size:1em; width:90%"value='{{$service->name}}' >
          <input type="submit" style="align-self:center" value="Изменить"  class="btn btn-primary">
          </form>
          <form method="POST" action="{{'deleteService'}}">
            @csrf
            <input name="id" type="hidden" value="{{$service->id}}">
            <input type="submit" style="align-self:center"  value="Удалить" class="btn btn-danger">
          </form>
          @endauth
          @guest
          <li class="h5">{{$service->name}}</li>
          @endguest
          @endforeach
        </ul>
      
    </div>
  </div>

  <div class="card " style="margin-top:20px;" >
    <div class="card-body d-flex flex-column justify-content-center " >
      <h3 class="card-title" style="align-self: center;">Продукция</h3> 
        <br>  
        @foreach ($products as $product)
            
          <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); align-self: center; width:80%; grid-column-gap: 150px;grid-row-gap: 1em;" >
            
            <div style="background-image: url('./{{"$product->image"}}'); width:30vw;height:30vw; ">

            </div>

            <div>
              <h3>{{$product->name}}</h3>
                <p>
                  {{$product->description}}
                </p>
            </div>
        </div>
        
        @endforeach
       
       
        
    
    
    </div>


  </div>
@endsection