@extends('layouts.master')
@section('title') {{'املاک برتر'}} @endsection

@section('content')

    <div  style="display:flex; justify-content:center;">
        <div class="container col-xs-6 col-sm-2" style="margin-top:100px; background-color:lightgrey; border-radius: 5px;">
        <h3><p style="text-align:center;">{{$name}} به املاک برتر خوش آمدید </p></h3><br>
        </div>
    </div><br>
    <section class="container" style="display:flex; justify-content:center;">
            
            <button class="btn btn-warning col-xs-3 col-sm-2"  style="text-align:center" onclick="location.href='{{'/'}}'; ">خروج</button>
            
    </section>
  
@endsection