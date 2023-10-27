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

    <form method="post" action="{{route('list.add')}}">
        @csrf
        @method('POST')

        <label for="name">Lijst naam : </label>
        <input type="text" name="name" id="name" placeholder="naam lijst" value="{{old('name')}}">

        <label for="winkel_id">Winkel :</label>
        <select name="winkel_id" id="winkel_id">
            <option value="0">Kies een winkel</option>
            <option value="1">Jumbo</option>
            <option value="2">Albert Heijn</option>
            <option value="3">Plus</option>
            <option value="4">Action</option>
            <option value="5">Lidl</option>
        </select>

        <label for="day">Dag :</label>
        <select name="day" id="day">
            <option value="0">Kies een dag</option>
            <option value="1">Maandag</option>
            <option value="1">Dinsdag</option>
            <option value="1">Woensdag</option>
            <option value="1">Donderdag</option>
            <option value="1">Vrijdag</option>
            <option value="1">Zaterdag</option>
            <option value="1">Zondag</option>
        </select>

        <button type="submit">Maak aan</button>
    </form>

@endsection
