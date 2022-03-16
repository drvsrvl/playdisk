<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Perfil;
use App\Models\Cesta;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $userLastID = User::latest('id')->first()->id; //Buscamos o último id de lista (a que acabamos de crear) para ensinalo
        $perfilLastID = Perfil::latest('id')->first()->id;
        $perfil = new Perfil;
        $perfil->login = 'perfil' . $perfilLastID+1;
        $perfil->descripcion = 'Son un novo usuario de PLAYDISK, agora podo escoitar, ordenar, mercar e compartir a miña música favorita.';
        $perfil->user_id = $userLastID;
        $perfil->foto = 'default.png';
        $perfil->save();

         //Buscamos o último id de lista (a que acabamos de crear) para ensinalo
        
        $cesta = new Cesta;
        $cesta->perfil_id = $perfilLastID+1;
        $cesta->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
