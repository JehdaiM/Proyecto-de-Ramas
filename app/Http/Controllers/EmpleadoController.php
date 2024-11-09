<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    public function index()
    {
        $items = Empleado::paginate(4);
        return view('modules.empleados.index', compact('items'));
    }

    public function create()
    {
        return view('modules.empleados.create');
    }

    public function store(Request $request)
    {
        $item = new Empleado();
        $item->nombre = $request->nombre;
        $item->descripcion = $request->descripcion;
        $item->salario = $request->salario;
        $item->horas_trabajo = $request->horas_trabajo;
        $item->save();

        return redirect()->route('empleados.index');
    }

    public function show($id)
    {
        $item = Empleado::find($id);
    
        if (!$item) {
            return redirect()->route('empleados.index')->with('error', 'Empleado no encontrado');
        }
    
        return view('modules.empleados.show', compact('item'));
    }
    

    public function edit($id)
    {
        $item = Empleado::find($id);
        return view('modules.empleados.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Empleado::find($id);
        $item->nombre = $request->nombre;
        $item->descripcion = $request->descripcion;
        $item->salario = $request->salario;
        $item->horas_trabajo = $request->horas_trabajo;
        $item->save();

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado.');
    }

    public function destroy($id)
    {
        $item = Empleado::find($id);
        $item->delete();

        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado.');
    }
}
