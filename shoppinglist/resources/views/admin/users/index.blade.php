@extends('layouts.app')

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <p>admin panel : user section</p>

    <div class="grid d-grid justify-content-center">
        @foreach($users as $user)
            <div class="bg-dark text-white rounded-4 text-xl-center w-auto mt-2 w-full p-2">
                <p>id : {{$user->id}}</p>
                <p>name : {{$user->name}} </p>
                <p>Email : {{$user->email}}</p>
                @if($user->role == 1)
                    <p>Role : Gebruiker</p>
                @elseif($user->role == 2)
                    <p>Role : Admin</p>
                @endif
                <a class="link-underline" href="{{route('admin.user.edit', $user->id)}}">Bewerk</a>
                <a class="link-underline-danger" href="{{route('admin.user.delete', $user->id)}}">Verwijder</a>
            </div>
        @endforeach
    </div>
@endsection
