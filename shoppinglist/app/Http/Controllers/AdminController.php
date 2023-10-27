<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminListDeleteRequest;
use App\Http\Requests\AdminListUpdateRequest;
use App\Http\Requests\AdminUserDeleteRequest;
use App\Http\Requests\AdminUserUpdateRequest;
use App\Models\Lijst;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function panel() {
        //choose what ??
        //lists //users
        return view('admin.panel');
    }

    //--- UN/PUBLISH LIST ---//
    public function publish(Lijst $list){

        $accepted = $list->accepted;

            if($accepted == 1) {
                $list->update([
                    'accepted' => false,
                ]);
                return redirect(route('admin.lists.index'))->with('status', 'Lijst Unpublished');
            }else{
                $list->update([
                    'accepted' => true,
                ]);
                return redirect(route('admin.lists.index'))->with('status', 'Lijst Published');
            }


    }


    //--- USER FUNCTIONALITIES ---//

    public function userindex() {

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function useredit(User $user) {

        return view('admin.users.edit', compact('user'));
    }

    public function userupdate(AdminUserUpdateRequest $request, User $user) {

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ]);

        return redirect(route('admin.users.index'))->with('status', 'user updated successfully');
    }

    public function userdelete(User $user) {

        return view('admin.users.delete', compact('user'));
    }

    public function userdestroy(AdminUserDeleteRequest $request, User $user) {

        $user->delete();

        return redirect(route('home'))->with('status', 'profile deleted successfully');
    }

    //--- LIST FUNCTIONALITIES ---//

    public function listindex() {

        $lists = Lijst::all();
        return view('admin.lists.index', compact('lists'));
    }

    public function listedit(Lijst $list) {

        $users = DB::table('users')->select('id', 'name')->get();

        return view('admin.lists.edit', compact('list', 'users'));
    }

    public function listupdate(AdminListUpdateRequest $request, Lijst $list) {

        $list->update([
           'name' => $request->name,
            'user_id' => $request->user_id,
            'winkel_id' => $request->winkel_id,
            'day' => $request->day
        ]);

        return redirect(route('admin.lists.index'))->with('status', 'list updated successfully');
    }

    public function listdelete(Lijst $list) {

        return view('admin.lists.delete', compact('list'));
    }

    public function listdestroy(AdminListDeleteRequest $request, Lijst $list) {

        $list->delete();

        return redirect(route('admin.lists.index'))->with('status', 'list deleted successfully');
    }
}
