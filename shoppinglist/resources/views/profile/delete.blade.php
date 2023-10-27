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

    <div class="container">
        <div class="container mx-1">


            <p class="text-3xl">Weet je zeker dat je je profiel wilt verwijderen?</p>

            <p>naam :{{$user->name}} - email: {{$user->email}}</p>

            <form method="post" action="{{ route('profile.delete') }}">
                @csrf
                @method('DELETE')

                <input type="checkbox" name="confirmation" id="confirmation">
                <label for="confirmation">Druk op deze checkbox om je account echt te verwijderen.</label>


                <div class="flex item-center justifiy-between">
                    <button id="submit"
                            class="alert alert-danger"
                            type="submit">Delete profiel
                    </button>
                </div>
            </form>
@endsection
