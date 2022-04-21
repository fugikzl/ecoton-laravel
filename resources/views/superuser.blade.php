@extends('layouts.main')
@section("content")
<br>
<br>
 
<form method="post" action="{{route('superuser.login')}}" class="d-flex flex-column "style="align-items:center">

   
    <p>Логин</p>
    <input type="" required name="login">
    <p>Пароль</p>
    <input type="" required name="password">
    <br>
    <input type="submit">
<br>
<br>
<br>
    
</form>
@endsection
    