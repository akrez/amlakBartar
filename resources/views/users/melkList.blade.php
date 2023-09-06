@extends('layouts.master')
@section('title')
    {{ 'املاک برتر' }}
@endsection

@section('content')
@include('users.navbar')
<section  style="display:flex; margin-top:50px; justify-content:center;">
                    <div class="form col-xs-8 col-sm-10" style="background-color:DarkGray; border-radius: 5px;">
                        @if($melks)                        
                            <div class="page-header">
                                <h4><p>ویرایش ملک</p></h4>
                            </div>
                                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                                    <thead>
                                        <tr class="alert alert-warning">
                                            <td><strong>مالک</strong></td>
                                            <td><strong>شماره همراه</strong></td>
                                            <td><strong>آدرس</strong></td>
                                            <td><strong>سال ساخت</strong></td>
                                            <td><strong>متراز</strong></td>
                                            <td><strong>ویرایش</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($melks as $melk)
                                            <tr>         
                                                <td>{{$melk->owner}}</td>
                                                <td>{{$melk->phone}}</td>
                                                <td>{{$melk->Address}}</td>
                                                <td>{{$melk->Construction}}</td>
                                                <td>{{$melk->Meterage}}</td>
                                                <td><a href="{{'melkEdit'}}">ویرایش</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        @endif
                    </div>
</section>

@endsection
