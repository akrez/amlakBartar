@extends('users.home')
@section('title')
    {{ 'املاک برتر' }}
@endsection

@section('content')

    @include('users.navbar')

    <section style="display:flex; margin-top:50px; justify-content:center;">
            @include('users.error')
            @include('users.message')
    </section>

    <div  style="display:flex; justify-content:center; margin-top:10px;">
        <div class="col-xs-8 col-sm-4" style="background-color:DarkGray; border-radius: 5px;">
            
            <h4>
                <p style="text-align:center;">ویرایش پروفایل</p>
            </h4><br>

            <form action="{{ 'profileEdit' }}" method="POST">

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="نام" name="name" value="{{ $_SESSION['name']}}">
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" placeholder="ایمیل" name="email"
                        value="{{ $_SESSION['email']}}">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="کلمه عبور" name="password">
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
