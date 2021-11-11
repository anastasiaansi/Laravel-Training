@extends('layouts.app')
@section('content')
    <h2>Hallo, {{Auth::user()->name}}</h2>
    @if(Auth::user()->avatar)
        <img src="{{ Auth::user()->avatar }}" style="width:200px"><br>
    @endif
    @if(Auth::user()->is_admin)
        <a href="{{route('admin.index')}}">Zu Admin</a>
    @endif
    <br>
    <a href="{{ route('logout') }}">Exit</a>
@endsection