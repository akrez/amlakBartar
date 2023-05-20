@extends('layouts.master')
@section('title')
    {{ '404 error' }}
@endsection
@section('content')
    <div style="text-align:center">
        <h1>Error 404</h1><br>
        <h4>{{ 'The page not found' }}</h4>
    </div>
@endsection
