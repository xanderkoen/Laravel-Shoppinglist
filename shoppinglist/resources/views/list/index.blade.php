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

    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif


    <div class="w-100 bg-black flex-row align-content-center p-2">
        <form method="post" action="{{route('lists.search')}}">
            @csrf
            @method('PUT')
            <input type="text" placeholder="zoek op naam..." name="search" id="search" value="{{old('search')}}">
            <label for="filter" class="text-white mx-2">Filter :</label>
            <select name="filter" id="filter">
                <option value="" selected>alle</option>
                @foreach($winkels as $winkel)
                    <option value="{{$winkel->id}}">{{$winkel->name}}</option>
                @endforeach
            </select>
            <button type="submit" class="mx-2">zoek</button>
        </form>
    </div>


    <p>Lijst index</p>

    <a href="{{route('list.create')}}">
        <button>Lijst aanmaken</button>
    </a>

    <div class="grid">
        @if($lists->count() == 0)
            <p>Geen resultaten.</p>
        @endif
        @foreach($lists as $list)

            <div class="bg-dark text-white text-center w-25 rounded">
                <p>{{$list->name}}</p>
                <p>Gemaakt door : {{$list->user->name}}</p>
                <p>Winkel : {{$list->winkel->name}}</p>
                <p>Voor dag : @if($list->day == 1)
                        Maandag
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

                <a href="{{route('list.show', $list->id)}}">
                    <button>Bekijk</button>
                </a>
            </div>
        @endforeach
    </div>
@endsection
