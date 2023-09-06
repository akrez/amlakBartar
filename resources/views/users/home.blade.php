@extends('layouts.master')
@section('title')
    {{ 'املاک برتر' }}
@endsection

@section('content')


    <div  style="display:flex; justify-content:center; margin-top:50px">
        <div class="col-xs-6 col-sm-2" style="border-radius: 5px;"><br>
                <div class="form-group">
                    <input type="submit" value="ورود" class="btn btn-primary  form-control" style="text-align:center"
                     onclick="location.href='{{ 'loginForm' }}'; ">
                </div>

                <div class="form-group">
                    <input type="submit" value="ثبت نام" class="btn btn-warning form-control" style="text-align:center"
                    onclick="location.href='{{ 'register' }}'; ">
                </div>
        </div>
    </div><br>

@endsection
