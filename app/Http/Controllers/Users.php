<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Users extends Controller
{
    public function welcome()
    {
        return view('welcome');  // Asegúrate de tener una vista 'welcome.blade.php'
    }

    // Método para mostrar todos los usuarios con paginación
    public function index()
    {
        $items = User::paginate(4);
        return view('modules.usuarios.index', compact('items'));
    }

    // Método para mostrar el formulario de creación
    public function create()
    {
        return view('modules.usuarios.create');
    }

    // Método para almacenar un nuevo usuario en la base de datos
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Crear el nuevo usuario
        $item = new User();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = bcrypt($request->password);  // Encriptación de la contraseña
        $item->save();

        return redirect()->route('index');  // Redirige a la vista de índice
    }

    // Método para mostrar un solo usuario
    public function show(string $id)
    {
        $item = User::find($id);
        return view('modules.usuarios.show', compact('item'));
    }

    // Método para mostrar el formulario de edición de usuario
    public function edit(string $id)
    {
        $item = User::find($id);
        return view('modules.usuarios.edit', compact('item'));
    }

    // Método para actualizar los datos del usuario
    public function update(Request $request, $id)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',  // Si no se proporciona una nueva contraseña, no la cambiaremos
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        // Si se proporciona una nueva contraseña, encriptarla
        if ($request->input('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Método para eliminar un usuario
    public function destroy(string $id)
    {
        $item = User::find($id);
        $item->delete();
        return redirect()->route('index');
    }
}
