@extends('layouts.master')
@section('title')
    {{ 'املاک برتر' }}
@endsection

@section('content')

<section  style="display:flex; margin-top:50px; justify-content:center;">
        @include('users.error')
        @include('users.message')
</section>
    <div style="display:flex; justify-content:center;">
        <div class="form col-xs-8 col-sm-2" style="background-color:DarkGray; border-radius: 5px;">
            

            <h4>
                <p style="text-align:center;">تغییر کلمه عبور</p>
            </h4><br>

            <form action="{{ 'changepass' }}" method="POST">

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="کلمه عبور جدید" name="password">
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
