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

    <form method="post" action="{{route('list.update', $list->id)}}">
        @csrf
        @method('PUT')

        <label for="name">Lijst naam : </label>
        <input type="text" name="name" id="name" value="{{old('name', $list->name)}}">

        <label for="winkel_id">Winkel :</label>
        <select name="winkel_id" id="winkel_id">
            @if($list->winkel_id == 1)
                <option value="1" selected>Jumbo</option>
            @else
                <option value="1">Jumbo</option>
            @endif

            @if($list->winkel_id == 2)
                <option value="2" selected>Albert Heijn</option>
            @else
                <option value="2">Albert Heijn</option>
            @endif

            @if($list->winkel_id == 3)
                <option value="3" selected>Plus</option>
            @else
                <option value="3">Plus</option>
            @endif

            @if($list->winkel_id == 4)
                <option value="4" selected>Action</option>
            @else
                <option value="4">Action</option>
            @endif

            @if($list->winkel_id == 5)
                <option value="5" selected>Lidl</option>
            @else
                <option value="5">Lidl</option>
            @endif
        </select>

        <label for="day">Dag :</label>
        <select name="day" id="day">
            @if($list->day == 1)
                <option value="1" selected>Maandag</option>
            @else
                <option value="1">Maandag</option>
            @endif

            @if($list->day == 2)
                <option value="2" selected>Dinsdag</option>
            @else
                <option value="2">Dinsdag</option>
            @endif

            @if($list->day == 3)
                <option value="3" selected>Woensdag</option>
            @else
                <option value="3">Woensdag</option>
            @endif

            @if($list->day == 4)
                <option value="4" selected>Donderdag</option>
            @else
                <option value="4">Donderdag</option>
            @endif

            @if($list->day == 5)
                <option value="5" selected>Vrijdag</option>
            @else
                <option value="5">Vrijdag</option>
            @endif

            @if($list->day == 6)
                <option value="6" selected>Zaterdag</option>
            @else
                <option value="6">Zaterdag</option>
            @endif

            @if($list->day == 7)
                <option value="7" selected>Zondag</option>
            @else
                <option value="7">Zondag</option>
            @endif
        </select>

        <button type="submit">Bewerk</button>
    </form>

@endsection
