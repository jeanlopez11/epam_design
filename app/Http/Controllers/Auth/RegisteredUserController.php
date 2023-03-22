<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Tavo\ValidadorEc;

class RegisteredUserController extends Controller
{

    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        #VALIDAMOS LA CEDULA, SI ES CORRECTA CREA EL USUARIO, SI NO ES CORRECTA MUESTRA UN MENSAJE DE ERROR
        $validador = new ValidadorEc;
        if ($validador->validarCedula($request->cedula)) {
            // try {
                DB::beginTransaction();
                $request->validate([
                    'cedula' => ['required','numeric','digits:10','unique:'.User::class],
                    'name' => ['required', 'string', 'max:125', 'min:5'],
                    'last_name' => ['required', 'string', 'max:125', 'min:10'],
                    'phone_number' => ['required', 'numeric','digits:10'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                ]);
        
                $user = User::create([
                    'cedula' => $request->cedula,
                    'name' => $request->name,
                    'last_name' => $request->last_name,
                    'phone_number' => $request->phone_number,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                event(new Registered($user));
                DB::commit();
                Auth::login($user);
                return redirect(RouteServiceProvider::HOME);        
            // } catch (\Throwable $th) {
                // DB::rollBack();
                // return redirect()->route('register')->withInput(array(
                    // 'name' => $request->name, 
                    // 'email' => $request->email, 
                    // 'last_name' => $request->last_name, 
                    // 'phone_number' => $request->phone_number))
                // ->withErrors(['cedula' => 'Cedula Invalida']);
            // }
        }else{
            return redirect()->route('register')->withInput(array(
                'name' => $request->name, 
                'email' => $request->email, 
                'last_name' => $request->last_name, 
                'phone_number' => $request->phone_number))
            ->withErrors(['cedula' => 'Cedula Invalida']);
        }
    }
}
