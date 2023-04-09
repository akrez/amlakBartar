@extends('layouts.master')
@section('title') {{'املاک برتر'}} @endsection

@section('content')

    <div  style="display:flex; justify-content:center;">
        <div class="container col-xs-6 col-sm-2" style="margin-top:100px; background-color:lightgrey; border-radius: 5px;">
        @include('users.errors')

        <p style="text-align:center;">ایمیل خود را وارد کنید</p><br>

             <form action="{{'login'}}" method="POST">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="ایمیل">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="ورود" class="btn btn-primary  form-control">
                        </div>
                    </form>

        </div>
    </div><br>

        <section class="container" style="display:flex; justify-content:center;">
            
            <button class="btn btn-warning col-xs-3 col-sm-2"  style="text-align:center" onclick="location.href='{{'register'}}'; ">عضویت</button>
            
        </section>

@endsection