<?php

namespace App\Http\Controllers;

use App\Models\Sesion; // Usamos el modelo de la tabla sesion
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; // Usamos la sesión de Laravel para el login manual

class SesionController extends Controller
{
    /**
     * Mostrar el formulario de registro.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('modules.inicio.register'); // Vistas en la carpeta login
    }

    /**
     * Registrar un nuevo usuario.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:sesion', // Usamos la tabla sesion
            'password' => 'required|string|min:8|confirmed', // Confirmación de la contraseña
        ]);

        // Crear el nuevo usuario en la base de datos
        $user = Sesion::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash de la contraseña
        ]);

        // Iniciar la sesión manualmente
        Session::put('user_id', $user->id);
        Session::put('user_name', $user->name);
        Session::put('user_email', $user->email);

        // Redirigir a la página de inicio
        return redirect()->route('login');
    }

    /**
     * Mostrar el formulario de inicio de sesión.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('modules.inicio.login'); // Vistas en la carpeta login
    }

    /**
     * Iniciar sesión de un usuario.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validación de los datos de inicio de sesión
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Buscar al usuario por el correo electrónico
        $user = Sesion::where('email', $request->email)->first();

        // Verificar si el usuario existe y si la contraseña es correcta
        if ($user && Hash::check($request->password, $user->password)) {
            // Iniciar la sesión manualmente
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->name);
            Session::put('user_email', $user->email);

            // Redirigir a la página de inicio
            return redirect()->route('login');
        } else {
            // Si no es válido, mostrar un error
            return back()->withErrors(['email' => 'Credenciales incorrectas.']);
        }
    }

    /**
     * Cerrar sesión del usuario.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        // Eliminar los datos de la sesión
        Session::flush();

        // Redirigir al formulario de inicio de sesión
        return redirect()->route('login');
    }
}
