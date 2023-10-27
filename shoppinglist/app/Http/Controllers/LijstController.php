<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\ListCreateRequest;
use App\Http\Requests\ListDeleteRequest;
use App\Http\Requests\ListUpdateRequest;
use App\Models\Comment;
use App\Models\Lijst;
use App\Models\Winkel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LijstController extends Controller
{
    //--- LIST COMMENTS FUNCTIONALITY ---//
    public function comment(CommentRequest $request, Lijst $list)
    {

        $comment = new Comment([
            'user_id' => auth()->user()->id,
            'lijst_id' => $list->id,
            'comment' => $request->comment,
        ]);

        $comment->save();

        return redirect(route('list.show', compact('list')))->with('status', 'comment geplaatst');

    }

    public function destroycomment(Comment $comment) {

        $list = Lijst::all()->where('id', $comment->lijst_id)->first();

        $comment->delete();


        return redirect(route('list.show', compact('list')))->with('status', 'comment verwijderd');
    }

    //--- LIST FUNCTIONALITY ---//
    public function index()
    {
        $lists = Lijst::all()->where('accepted', true);

        $winkels = Winkel::all();

        return view('list.index', compact('lists', 'winkels'));
    }

    public function search(Request $request)
    {

        $search = $request->search;
        $filter = $request->filter;

        $query = Lijst::query();

        if ($search) {
            $query->where('name', 'LIKE', "%$search%");
        }

        if ($filter) {
            $query->where('winkel_id', '=', "$filter");
        }

        $lists = $query->where('accepted', true)->get();

        $winkels = Winkel::all();

        return view('list.index', compact('lists', 'winkels'));
    }

    public function show(Lijst $list)
    {

        $comments = Comment::all()->where('lijst_id', '=', "$list->id");

        return view('list.show', compact('list', 'comments'));
    }

    public function create()
    {

        return view('list.create');
    }

    public function add(ListCreateRequest $request)
    {

        $list = new Lijst([
            'user_id' => Auth()->user()->id,
            'name' => $request->name,
            'winkel_id' => $request->winkel_id,
            'day' => $request->day,
        ]);

        $list->save();

        return redirect(route('lists.index'))->with('status', 'lijst sucessvol aangemaakt!');
    }

    public function edit(Lijst $list)
    {

        return view('list.edit', compact('list'));
    }

    public function update(ListUpdateRequest $request, Lijst $list)
    {

        $list->update([
            'name' => $request->input('name'),
            'winkel_id' => $request->input('winkel_id'),
            'day' => $request->input('day')
        ]);

        return redirect(route('list.show', $list->id))->with('status', 'lijst updated!');
    }

    public function delete(Lijst $list)
    {

        return view('list.delete', compact('list'));
    }

    public function destroy(ListDeleteRequest $request, Lijst $list)
    {

        $list->delete();

        return redirect(route('lists.index'))->with('status', 'lijst deleted');
    }
}
