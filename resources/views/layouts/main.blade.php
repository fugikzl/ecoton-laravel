<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <script src="{{asset("js/app.js")}}"></script>
    <script src="{{asset("bootstrap/app.js")}}"></script>
    <style>
      body {
          font-family: 'Nunito', sans-serif;
      }
  </style>
</head>
<style>
    *{
        margin:0 0;
        padding: 0 0; 
    }
$container-max-widths: (
  sm: 540px,
  md: 720px,
  lg: 960px,
  xl: 1140px,
  xxl: 1320px
);
$container-min-heights: (
  sm: 540px,
  md: 720px,
  lg: 960px,
  xl: 1140px,
  xxl: 1320px
);
$footer-max-widths: (
  sm: 540px,
  md: 720px,
  lg: 960px,
  xl: 1140px,
  xxl: 1320px
);
$header-max-widths: (
  sm: 540px,
  md: 720px,
  lg: 960px,
  xl: 1140px,
  xxl: 1320px
);
</style>
<body>
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm " style="background-color: #ffffff;">
            <div class="container-fluid">
                <a  class="navbar-brand h2 " style="margin-left: 1em">Kazecotech</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse grid" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="{{route('main')}}" class="nav-item  h5 nav-link " style="margin-left: 1em">Блог</a>

                        <a href="{{route('map')}}" class="nav-item h5 nav-link "style="margin-left: 1em" >Карта контейнеров</a>

                        <a href="{{route('about')}}" class="nav-item  h5 nav-link" style="margin-left: 1em">О компании</a>
                        <a href="{{route('products')}}" class="nav-item  h5 nav-link" style="margin-left: 1em">Услуги и продукция</a>
                        <a href="{{route('licenses')}}" class="nav-item  h5 nav-link" style="margin-left: 1em">Лицензии и сертификаты</a>
                        <a href="{{route('contacts')}}" class="nav-item  h5 nav-link" style="margin-left: 1em">Контакты</a>
                        @auth
                        <a href="{{route('admin')}}" class="nav-item  h5 nav-link text-primary" style="margin-left: 1em">Админ</a>
                        <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <input type="submit" class="nav-item  h5 nav-link text-danger" style="margin-left: 1em;border: none;outline: none; background: none;" value="Выйти">
                        </form>
                        @endauth

                    </div>
                    
                </div>
            </div>
        </nav>
    </div>
    <br>
    <div class="container shadow-sm  d-flex flex-column justify-content-center">
       
        @yield('content')
        <br>
    </div>
    <div style=>
    </div>
    

</body>
</html>



