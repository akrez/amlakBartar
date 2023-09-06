@extends('layouts.master')
@section('title')
    {{ 'املاک برتر' }}
@endsection

@section('content')

<section  style="display:flex; margin-top:50px; justify-content:center;">
<div class="col-xs-6 col-sm-2 form-control alert-success" style="text-align:center;">
        @include('users.error')
</div>
</section>
    <div style="display:flex; justify-content:center; margin-top:10px;">
        <div class="form col-xs-8 col-sm-2" style="background-color:DarkGray; border-radius: 5px;">

            <h5>
                <p style="text-align:center;">برای بازیابی کلمه عبور نام خود را وارد کنید</p>
            </h5><br>

            <form action="{{ 'recovery' }}" method="POST">

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="نام خود را وارد کنید" name="name">
                </div>

                <div class="form-group" style="text-align:center;">
                    <button type="submit" name="submit" class="btn btn-success">تایید</button>

                </div>

            </form>

        </div>
    </div>
@endsection
