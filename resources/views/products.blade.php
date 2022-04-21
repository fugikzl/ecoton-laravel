@extends('layouts.main')
@section("content")
<div class="card " style="margin-top:20px;" >

    <div class="card-body d-flex flex-column justify-content-center" >
      <h3 class="card-title" style="align-self: center;">Услуги</h3> 
        <br>  
        <ul>
          @foreach ($services as $service)
          <li class="h5">{{$service->name}}</li>
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