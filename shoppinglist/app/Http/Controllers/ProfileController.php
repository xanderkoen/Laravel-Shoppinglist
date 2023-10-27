<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileDeleteRequest;
use App\Models\Lijst;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user(); // Get the currently logged-in user

        $lists = Lijst::all()->where('user_id', '=', "$user->id");
        return view('profile.show', compact('user', 'lists'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user(); // Get the currently logged-in user

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // Update other fields here
        ]);

        return redirect()->route('profile.show')->with('status', 'Profile updated successfully');
    }

    public function delete(){

        $user = auth()->user();

        return view('profile.delete', compact('user'));
    }

    public function destroy(ProfileDeleteRequest $request) {
        $user = auth()->user();
        $user->delete();
        return redirect()->route('home')->with('status', 'Profile deleted successfully!');
    }
}
