@extends('layouts.app')

@section('content')
    <p>admin panel</p>
    <p>Kies wat je wilt beheren :</p>
    <a href="{{route('admin.users.index')}}">Users</a>
    <br>
    <a href="{{route('admin.lists.index')}}">Lijsten</a>
@endsection
