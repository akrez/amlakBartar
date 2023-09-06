@extends('layouts.master')
@section('title')
    {{ 'املاک برتر' }}
@endsection

@section('content')

<section  style="display:flex; justify-content:center;">
<div class="col-xs-6 col-sm-2">
</div>
</section>
@include('users.navbar')
<div  style="display:flex; justify-content:center; margin-top:50px;">
    @include('users.error')
</div>

@endsection
