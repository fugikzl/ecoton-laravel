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
      <h3 class="card-title">Войти в панель управления</h3> 
      <form method="POST" action={{'login'}}>
      <div class="form-group d-flex flex-column" style="">
        @csrf
        <label for="exampleFormControlInput1">Введите логин</label>
        <input type="login" name="login" class="form-control form-control" id="exampleFormControlInput1" placeholder="login">
        <label for="exampleFormControlInput1">Введите пароль</label>
        <input type="password" name =" password" class="form-control form-control" id="exampleFormControlInput1" placeholder="password">
        <br>
        <input type="submit" class="btn btn-primary">
      </div>
      </form>
    </div>
  </div>
@endsection