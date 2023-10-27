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
    <div class="grid">
        <div class="bg-dark text-white text-center w-25 rounded">
            <p class="text-xl-center">{{$list->name}}</p>
            <p>Gemaakt door : {{$list->user->name}}</p>
            <p>Winkel : {{$list->winkel->name}}</p>
            <p>Voor dag : @if($list->day == 1)
                    Maandag</p>
            @elseif($list->day == 2)
                Dinsdag</p>
            @elseif($list->day == 3)
                Woensdag</p>
            @elseif($list->day == 4)
                Donderdag</p>
            @elseif($list->day == 5)
                Vrijdag</p>
            @elseif($list->day == 6)
                Zaterdag</p>
            @elseif($list->day == 7)
                Zondag</p>
            @endif

            <form method="post" action="{{route('list.destroy', $list->id)}}">
                @csrf
                @method('DELETE')

                <div>
                    <p>weet je zeker dat je deze lijst wilt verwijderen?</p>

                    <label for="confirmation">Druk op deze knop om je lijst te verwijderen</label>
                    <input type="checkbox" name="confirmation" id="confirmation">

                    <button type="submit">Verwijder {{$list->name}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
