@extends('layouts.master')
@section('title')
    {{ 'املاک برتر' }}
@endsection

@section('content')
    <div style="display:flex; justify-content:center;">
        <div class="col-xs-6 col-sm-3" style="margin-top:100px; background-color:DarkGray; border-radius: 5px;">

            @include('users.errors')
            @include('users.messages')

            <p style="text-align:center;">کلمه عبور را وارد کنید</p><br>

            <form action="{{ 'password' }}" method="POST">
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="کلمه عبور">
                </div>


                <div class="form-group">
                    <input type="submit" value="تایید" class="btn btn-primary  form-control">
                </div>
            </form>

        </div>
    </div><br />
    <section style="display:flex; justify-content:center;">

        <button class="btn btn-warning col-xs-3 col-sm-2" style="text-align:center"
            onclick="location.href='{{ 'recoverypass' }}'; "> کلمه عبور را فراموش کرده ام</button>

    </section>
@endsection
