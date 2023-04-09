@extends('layouts.master')
@section('title') {{'املاک برتر'}} @endsection

@section('content')


<div style="display:flex; justify-content:center;">
<div class="form col-xs-8 col-sm-3" style="margin-top:100px; background-color:lightgrey;">
        @include('users.errors')

        <h5><p  style="text-align:center;">برای بازیابی کلمه عبور نام خود را وارد کنید</p></h5><br>

           <form action="{{'recovery'}}" method="POST">

               <div class="form-group">
                   <input type="text" class="form-control" placeholder="نام خود را وارد کنید" name="name" >
               </div>
       
               <div class="form-group" style="text-align:center;">
                   <button  type="submit" name="submit" class="btn btn-success">تایید</button>
       
               </div>
             
           </form>
           
       </div>
</div>

@endsection
