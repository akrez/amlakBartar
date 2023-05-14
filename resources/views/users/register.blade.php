@extends('layouts.master')
@section('title') {{'املاک برتر'}} @endsection

@section('content')

<div style="display:flex; justify-content:center;">
    <div class="col-xs-8 col-sm-4" style="margin-top:100px; background-color:DarkGray; border-radius: 5px;">
        @include('users.messages')
        @include('users.errors')

        <h4>
            <p style="text-align:center;">عضویت</p>
        </h4><br>

        <form action="{{'sort'}}" method="POST">

            <div class="form-group">
                <input type="text" class="form-control" placeholder="نام" name="name" value="{{$name}}">
            </div>

            <div class="form-group">
                <input type="email" class="form-control" placeholder="ایمیل" name="email" value="{{$email}}">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" placeholder="کلمه عبور" name="password">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" placeholder="تکرار کلمه عبور" name="password_again">
            </div>

            <div class="form-group" style="text-align:center;">
                <button type="submit" name="submit" class="btn btn-success">ثبت</button>

            </div>

        </form>

    </div>
</div>

@endsection