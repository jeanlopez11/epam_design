<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Doctrine\Inflector\Rules\English\Rules;
use DragonCode\Contracts\Cashier\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = auth()->user();
        unset($user->password);
        return view('pages.profile.edit', [
            'user' => $user,
            // 'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {


        $request->validate([
            'name' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:125', 'min:5'],
            'last_name' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:125', 'min:7'],
            'phone_number' => ['required', 'numeric','digits:10'],
            'email' => ['required', 'email:rfc,dns'],

        ]);
        $request->user()->fill([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
        ]);
        
        if ($request->user()->isDirty('email')) {
            $request->validate([
                'email' => ['required', 'email:rfc,dns', 'unique:'.User::class],
            ]);
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')
        ->with('status', 'profile-updated');
        // ->with('success', 'Registros actualizado correctamente');
            // ->with('message', 'Datos Actualizados');    
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
