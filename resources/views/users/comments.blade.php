@extends('users.home')
@section('title')
{{ 'املاک برتر' }}
@endsection

@section('content')

@include('users.navbar')

<section  style="display:flex; margin-top:50px; justify-content:center;">
<div class="col-xs-8 col-sm-4">
    @include('users.messages')
    @include('users.errors')
</div>
</section>

<div style="display:flex; justify-content:center;">    
    <div class="col-xs-8 col-sm-4" style="background-color:DarkGray; border-radius: 5px;">
            
        <h4>
            <p style="text-align:center;">نظر و پیشنهاد</p>
        </h4><br>

        <form action="{{ 'commentSort' }}" method="POST">

            <div class="form-group">
                <input type="text" class="form-control" placeholder="نام" name="name" value="{{ $name }}" readonly>
            </div>

            <div class="form-group">
                <input type="email" class="form-control" placeholder="ایمیل" name="email" value="{{ $email }}" readonly>
            </div>
            <div>
                <textarea class="form-control" name="message" rows="5" placeholder="متن پیام"></textarea>
            </div>
          <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">فرستادن پیام</button>
                    <a href="{{'home'}}" class="btn btn-warning">انصراف</a>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection