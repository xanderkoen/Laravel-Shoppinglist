@extends('layouts.app')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="">
                @foreach($errors->all() as $error)
                    <li>{{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif

    <p>[Admin panel] Delete {{$user->name}}</p>
    <p>Weet je zeker dat je deze gebruiker wilt verwijderen?</p>
    <div class="bg-dark text-white text-center">
        <p>ID : {{$user->id}}</p>
        <p>Naam : {{$user->name}}</p>
        <p>Email : {{$user->email}}</p>
        @if($user->role == 1)
            <p>Role : Gebruiker</p>
        @elseif($user->role == 2)
            <p>Role : Admin</p>
        @endif
    </div>

    <form method="post" action="{{route('admin.user.destroy', $user->id)}}" class="grid d-grid justify-content-center">
        @csrf
        @method('DELETE')

        <div>
            <input type="checkbox" name="confirmation" id="confirmation">
            <label for="confirmation">Druk op deze knop om de gebruiker te verwijderen</label>
        </div>

        <button type="submit">Verwijder gebruiker</button>

    </form>
@endsection
