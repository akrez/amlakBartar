@extends('layouts.master')
@section('title') {{'املاک برتر'}} @endsection

@section('content')

<div style="display:flex; justify-content:center;">
    <div class="form col-xs-8 col-sm-10" style="margin-top:50px; background-color:DarkGray; border-radius: 5px;">

        <h4>
            <p style="text-align:center;">ثبت ملک جدید</p>
        </h4><br>

    <form action="{{'sortMelk'}}" method="POST" enctype="multipart/form-data">
        <div class="form col-xs-8 col-sm-5" style="background-color:DarkGray ;">
            @include('users.messages')
            @include('users.errors')

            <div class="form-group">
                <input type="text" class="form-control" placeholder="مالک" name="owner" value="{{$owner}}">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="شماره همراه" name="phone"
                    value="{{$phone }}">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="آدرس" name="Address" value="{{$Address}}">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="سال ساخت" name="Construction"
                    value="{{$Construction}}">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="متراژ" name="Meterage" value="{{$Meterage}}">
            </div>

            <div class="form-group">
                <select name="Direction" class="form-control">
                    <option value="شمالی">-- شمالی --</option>
                    <option value="جنوبی">جنوبی</option>
                    <option value="شرقی">شرقی</option>
                    <option value="غربی">غربی</option>
                </select>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="تعداد طبقات" name="Floors" value="{{$Floors}}">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="تعداد واحد در طبقه" name="units"
                    value="{{$units}}">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="طبقه چندم" name="Floor" value="{{$Floor}}">
            </div>

            <div class="form-group">
                <input type="checkbox" name="Elevator" value="1"> آسانسور <br>
            </div>

            <div class="form-group">
                <input type="checkbox" name="Parking" value="1"> پارکینگ
            </div>

            <div class="form-group">
                <input type="radio" name="Sell_rent" value="فروش" checked> فروش
                <input type="radio" name="Sell_rent" value="اجاره"> اجاره
            </div>
        </div>

        <div class="form col-xs-8 col-sm-7" style="background-color:DarkGray;">

            <div class="row form-group">
                <textarea type="text" class="form-control" name="description" placeholder="توضیحات" cols="30"
                    rows="5"></textarea>
            </div>

            <div class="row form-group">
                <p style="text-align:center;">افزودن تصاویر ملک</p>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="row form-group">

                <div style="text-align:center;">
                    <h4>
                        <p>تعیین موقعیت ملک روی نقشه</p>
                    </h4>
                    <p>در نقطه مورد نظر دابل کلیک کنید</p>
                </div>
                
            <div id="map" style="height: 200px;"></div>
                <script>
                    var map = L.map('map').setView([35.69, 51.38], 10);
                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);

                    map.on('dblclick', function(e) {
                        var marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
                        latitude = e.latlng.lat;
                        lngitude = e.latlng.lng;
                    });

                </script>
            </div><br>
            <script>
 
                    function Load(){
                    const request = new XMLHttpRequest();
                    var lat = document.getElementById("latitude").value;
                    var lngitude = document.getElementById("lngitude").value;
                    
                    request.onload = function(){
                    result.innerHTML = this.responseText;
                    }
                    request.open("POST", "./MelkController.php");
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.send("latitude="+lat+"");
                    }
                    
            </script>


            <div class="form-group" style="text-align:center;">
                <button type="submit" name="submit"  onclick='Load()' class="btn btn-primary"> ثبت </button>

            </div>
        </div>

    </form>
    </div>

</div>

@endsection