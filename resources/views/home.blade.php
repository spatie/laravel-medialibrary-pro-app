@extends('layouts.master')

@section('content')
    <ul>
        <li><a href="{{ route('vue.single') }}">Vue single</a></li>
        <li><a href="{{ route('vue.multiple') }}">Vue multiple</a></li>
        <li><a href="{{ route('react.single') }}">React single</a></li>
        <li><a href="{{ route('react.multiple') }}">React multiple</a></li>
        <li><a href="{{ route('vapor') }}">Vapor</a></li>
    </ul>
@endsection
