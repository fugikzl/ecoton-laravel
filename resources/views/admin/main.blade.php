<meta name="csrf-token" content="{{ csrf_token() }}">
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
<style>
    li {
     list-style-type: none; /* Убираем маркеры */
    }
    ul {
     margin-left: 0; /* Отступ слева в браузере IE и Opera */
     padding-left: 0; /* Отступ слева в браузере Firefox, Safari, Chrome */
    }
    .btn:focus,
    .btn:active {
    box-shadow: none !important;
    }
    html
    {
        scroll-behavior:smooth;
    }
    .ColMan{
        margin-top: 3.5vw; 
    }
    .btn-primary{
        background-color: rgb(120, 120, 161) !important;
        font-weight: 400 !important;
        font-size: 1.2em;
    }
    
   </style>
  <link rel="stylesheet" href="{{asset('ol/ol.css')}}" type="text/css">

  <script src= "{{asset('ol/ol.js')}}"></script>
  <script>
      var pinStyle = new ol.style.Style({
          image: new ol.style.Icon({
              anchor: [0.5, 46],
              scale: 0.12,
            anchorXUnits: 'fraction',
            anchorYUnits: 'pixels',
            src: "{{asset('ol/trash.webp')}}"
          })
        });
  </script>

<div class="qw " style="margin-top:20px;" >
    

    <div class="card-body d-flex flex-column justify-content-center" style=" gap:0.5vw;">
      <h3 class="card-title" style="align-self: center">Панель управления контентом</h3> 

            <a class="btn btn-light ColMan shadow-sm "  href="#posts" role="button" style="font-size:1.3em;width:100%; background-color:white" >
                Добавить пост
              </a>
              <div class="collapse  shadow-sm " id="posts">
                <div class="card card-body ">
                    <form class =" d-flex flex-column justify-content-center" method="POST" action="{{'addPost'}}" style=" gap:0.5vw;">
                        @csrf
                        <label >Заголовок</label>
                        <input class="form-control form-control" placeholder="" maxlength="63"name="title">
                        <label >Текст поста</label>
                        <textarea style="height:300px"name="content" placeholder="" class="form-control" ></textarea>
                        <input type="submit" value="Опубликовать пост" class="btn btn-primary">
                    </form>
                </div>
 
              </div>
        
              <a class="btn btn-light ColMan shadow-sm" style="font-size:1.3em; width:100%; background-color:white">
                Редактирование вкладки про нас
              </a>
              <div class="collapse shadow-sm " id="about">
                <div class="card card-body">
                    <form method="post" action="{{'redactAbout'}}" class =" d-flex flex-column justify-content-center" style=" gap:0.5vw;">
                        @csrf

                        <label >Текст</label>
                        <textarea style="height:300px" name="content" placeholder="" class="form-control" >
                        @foreach ($about as $aboba)
                    {{ $aboba->content }}
                        @endforeach
                    </textarea>
                        <input type="submit" value="Редактировать" class="btn btn-primary">
                    </form>
                </div>
              </div>
              <a class="btn btn-light ColMan shadow-sm" style="font-size:1.3em;width:100%; background-color:white">
                Редактировать вкладки Продукция
              </a>
              <div class="collapse shadow-sm " id="products">
                <div class="card card-body ">
                    <label style="align-self: center">Добавление услуги</label>

                    <form method="post" action="{{'addService'}}" class =" d-flex flex-column justify-content-center" style=" gap:0.5vw;">
                        @csrf
                        <label >Описание</label>
                        <input class="form-control" name="name" placeholder="" maxlength = "255" >
                        <input type="submit" value="Добавить услугу" class="btn btn-primary">
                    </form>
                </div>
                <br>
                <div class="card card-body ">
                    <label style="align-self: center" >Добавление продукции</label>

                    <form method="post" enctype="multipart/form-data"  action="{{'addProduct'}}"  class =" d-flex flex-column justify-content-center" style=" gap:0.5vw;">
                        <label >Название</label>
                        @csrf

                        <input class="form-control form-control" name="name" placeholder="">
                        <label >Описание</label>
                        <textarea class="form-control" placeholder="" name="description"></textarea>
                        <label>Ихображение продукта</label>
                        <input type="file" name="image" placeholder="">
                        <input type="submit" value="Добавить продукцию" class="btn btn-primary">
                    </form>
                </div>
              </div>
              <a class="btn btn-light ColMan shadow-sm" style="font-size:1.3em;width:100%; background-color:white">
                Добавить/удалить Лицензии - В разработке
              </a>
              <div class="collapse shadow-sm " id="licenses">
                <div class="card card-body">
                    <form class =" d-flex flex-column justify-content-center" style=" gap:0.5vw;">
                        <label >Название лицензии</label>
                        <input class="form-control form-control">
                        <label >Файл</label>
                        <input type="file">
                        <input type="submit" value="Опубликовать пост" class="btn btn-primary">
                    </form>                </div>
              </div>
              <a class="btn btn-light ColMan shadow-sm" style="font-size:1.3em;width:100%; background-color:white" >
                Работа с картой
              </a>
              <div class="collapse shadow-sm show" style="padding: 20px 20px">
                @include("admin.map")
                <table style="max-width:100%"class="table">
                    <tbody>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Широта</th>
                            <th scope="col">Долгота</th>
                            <th scope="col">Описание</th>
                            <th scope="col">Редактировать</th>
                            <th scope="col">Удалить</th>
                        </tr>
                        @foreach ($markers as $marker)
                        <tr id="marker{{$marker->id}}">
                            <td scope="row">{{$marker->id}}</td>
                            <td>{{$marker->lat}}</td>
                            <td>{{$marker->lng}}</td>
                            <td><form method="POST" action="{{'redactMarker'}}"> <input style="width:20vw" name="description" value='{{$marker->description}}'></td>
                            <td><input type="hidden" name="id" value="{{$marker->id}}">@csrf<input type="submit" style="font-size:1em;" class="btn btn-primary" value="Редактировать"></td></form>
                            <td><input type="hidden" name="id" value="{{$marker->id}}"><input type="submit"  id="{{$marker->id}}"onclick="deleteMarker(this.id)"  style="font-size:1em;" class="btn btn-danger"value="Удалить"></td>
                            @csrf
                        </tr>
                        @endforeach
                        

                    </tbody>
                </table>  
              </div>
        
    </div>
  </div>
  <script src="{{asset('/index.js')}}"></script>
  <script >
    function deleteMarker(id)
    {
      $.ajax(
        {
          type: "POST",
          url : "deleteMarker",
          data: {
            id: id
          },
          function() {}
        }
      );

      document.getElementById("marker" + id).parentNode.removeChild(document.getElementById("marker" + id));
    }
  </script>
  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


@endsection