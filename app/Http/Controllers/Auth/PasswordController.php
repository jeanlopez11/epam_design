<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{

    public function update(Request $request): RedirectResponse
    {
        if($request->password != $request->password_confirmation){
            return back()->with('error', 'La contraseña actual no coincide con la contraseña ingresada')
                            ->withErrors(['password' => "No coinciden las contraseñas."]);
        }
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->with('error', 'La contraseña actual no coincide con la contraseña ingresada')
                            ->withErrors(['current_password' => "Contraseña actual no es correcta."]);
        }
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);
        return back()->with('status', 'password-updated');
    }
}
