@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container mx-1">

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


            <p class="text-3xl">Edit {{$user->name}}</p>

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Name
                    </label>
                    <input
                        name="name" id="name" value="{{old('name', $user->name)}}" type="text">
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Mail
                    </label>
                    <input
                        name="email" id="email" value="{{old('email', $user->email)}}" type="email">
                </div>


                <div class="flex item-center justifiy-between">
                    <button id="submit" type="submit">Update Profiel</button>
                </div>
            </form>

            <div class="flex item-center justifiy-between">
                <a href="{{route('profile.delete')}}">
                    <button>Delete Profiel</button>
                </a>
            </div>


            <br>

            <p>Al mijn gemaakte lijsten</p>

            <div class="container">
                <div class="row">
                    @foreach($lists as $list)
                        <div class="bg-dark text-white text-center w-25 rounded m-2 col">
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
            </div>
        </div>
    </div>
@endsection
