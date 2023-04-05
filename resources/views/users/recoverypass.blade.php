@extends('layouts.master')
@section('title') {{'املاک برتر'}} @endsection

@section('content')


<div style="display:flex; justify-content:center;">
<div class="form col-xs-8 col-sm-3" style="margin-top:100px; background-color:lightgrey;">

            @include('users.messages')

            <h4><p  style="text-align:center;">برای بازیابی کلمه عبور ایمیل خود را وارد کنید</p></h4><br>


           <form action="" method="POST">

               <div class="form-group">
                   <input type="email" class="form-control" placeholder="ایمیل" name="email"  maxlength="30">
               </div>
           
               <div class="form-group" style="text-align:center;">
                   <button  type="submit" name="submit" class="btn btn-success">تایید</button>
       
               </div>
             
           </form>
           
       </div>
</div>

@endsection
