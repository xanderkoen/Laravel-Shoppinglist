@extends('layouts.app')

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <p>admin panel : list section</p>

    <div class="grid d-grid justify-content-center">
        @foreach($lists as $list)
            <div class="bg-dark text-white rounded-4 text-xl-center w-auto mt-2 w-full p-2">
                <p>name : {{$list->name}} </p>
                <p>gemaakt door : {{$list->user->name}}</p>
                <p>Winkel : {{$list->winkel->name}}</p>
                <p>Voor dag :
                @if($list->day == 1)
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
                <a class="link-underline-info" href="{{route('list.show', $list->id)}}">Bekijk</a>
                <a class="link-underline-" href="{{route('admin.list.edit', $list->id)}}">Bewerk</a>
                <a class="link-underline-danger" href="{{route('admin.list.delete', $list->id)}}">Verwijder</a>
                @if($list->accepted == true)
                    <p>Deze lijst is gepubliceerd</p>
                    <form method="POST" action="{{route('admin.publish', $list->id)}}">
                        @csrf
                        @method('POST')

                        <button type="submit" class="alert alert-danger">Unpublish</button>
                    </form>
                @else
                    <p>Deze lijst is nog niet gepubliceerd</p>
                    <form method="POST" action="{{route('admin.publish', $list->id)}}">
                        @csrf
                        @method('POST')

                        <button type="submit" class="alert alert-success">Publish</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
@endsection
