@extends('layouts.master')
@section('title')
    {{ 'املاک برتر' }}
@endsection

@section('content')

<section style="display:flex; margin-top:50px;">
    <div class="col-xs-6 col-sm-2" >
        @include('users.error')
        @include('users.message')
    </div>
</section>
        
    <div  style="display:flex; justify-content:center; margin-top:10px;">
        <div class="col-xs-6 col-sm-2" style="background-color:DarkGray; border-radius: 5px;">
            <p style="text-align:center;">ایمیل خود را وارد کنید</p><br>

            <form action="{{ 'login' }}" method="POST">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="ایمیل">
                </div>

                <div class="form-group">
                    <input type="submit" value="ورود" class="btn btn-primary  form-control">
                </div>
            </form>

        </div>
    </div>
@endsection
