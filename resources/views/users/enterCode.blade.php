@extends('layouts.master')
@section('title')
    {{ 'املاک برتر' }}
@endsection

@section('content')

<section  style="display:flex; margin-top:50px; justify-content:center;">
        @include('users.error')
        @include('users.message')
</section>
        
    <div  style="display:flex; justify-content:center; margin-top:10px;">
        <div class="col-xs-6 col-sm-2" style="background-color:DarkGray; border-radius: 5px;">

            <p style="text-align:center;"> کد را وارد کنید</p><br>

            <form action="{{ 'checkCode' }}" method="POST">
                <div class="form-group">
                    <input type="text" name="code" class="form-control" placeholder=" کد ورود ">
                </div>


                <div class="form-group">
                    <input type="submit" value="ورود" class="btn btn-primary  form-control">
                </div>
            </form>

        </div>
    </div>
    <section style="display:flex; justify-content:center;">

        <button class="btn btn-warning col-xs-3 col-sm-2" style="text-align:center"
            onclick="location.href='{{ 'enterPassword' }}'; ">ورود با کلمه عبور</button>

    </section>
@endsection
