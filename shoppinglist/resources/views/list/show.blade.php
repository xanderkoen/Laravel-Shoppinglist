@extends('layouts.app')

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <div class="grid">
        @if($list->accepted == false)
            <p>Deze lijst is nog niet door een admin gepubliceerd</p>
        @endif
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

                @if(auth()->user()->id == $list->user_id)
                    <a href="{{route('list.edit', $list->id)}}"><button>Pas je lijst aan</button></a>

                    <a href="{{route('list.delete', $list->id)}}"><button>Verwijder lijst</button></a>
                @endif
            </div>

        <div class="mt-5 text-bg-secondary">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{route('comment', $list->id)}}" class="mx-2">
                @csrf
                @method('POST')

                <input type="text" name="comment" id="comment" placeholder="type je comment..." value="{{old('comment')}}">
                <button type="submit">Plaats comment</button>


            </form>
            <p class="text-center">---Comments---</p>

                @if($comments->count() == 0)
                    <p class="text-center mt-5">Er zijn nog geen reacties. Wordt de eerste door er een te plaatsen!</p>
                @endif

            @foreach($comments as $comment)
                <div class="bg-dark mb-1 d-flex flex-column">
                    <p class="fs-6">{{$comment->user->name}}</p>
                    <div class="d-flex flex-row justify-content-between">
                        <p class="fs-4">{{$comment->comment}}</p>
                        <form method="post" action="{{route('comment.delete', $comment->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="mx-2" type="submit">Verwijder</button>
                        </form>

                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
