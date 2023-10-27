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

    <p>[Admin panel] Delete {{$list->name}}</p>
    <p>Weet je zeker dat je deze lijst wilt verwijderen?</p>
    <div class="bg-dark text-white text-center">
        <p>Naam : {{$list->name}}</p>
        <p>gemaakt door : {{$list->user->name}}</p>
        <p>winkel : {{$list->winkel->name}}</p>
        @if($list->day == 1)
            <p>Dag : Maandag</p>
        @elseif($list->day == 2)
            <p>Dag : Dinsdag</p>
        @elseif($list->day == 3)
            <p>Dag : Woensdag</p>
        @elseif($list->day == 4)
            <p>Dag : Donderdag</p>
        @elseif($list->day == 5)
            <p>Dag : Vrijdag</p>
        @elseif($list->day == 6)
            <p>Dag : Zaterdag</p>
        @elseif($list->day == 7)
            <p>Dag : Zondag</p>
        @endif
    </div>

    <form method="post" action="{{route('admin.list.destroy', $list->id)}}" class="grid d-grid justify-content-center">
        @csrf
        @method('DELETE')

        <div>
            <input type="checkbox" name="confirmation" id="confirmation">
            <label for="confirmation">Druk op deze knop om de lijst te verwijderen</label>
        </div>

        <button type="submit">Verwijder lijst</button>

    </form>
@endsection
