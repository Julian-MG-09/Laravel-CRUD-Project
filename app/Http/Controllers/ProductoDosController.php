<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoDosController extends Controller
{
    /**
     * listar todos los productos
     */
    public function index(Request $request)
    {
     // Capturar el término de búsqueda del usuario
    $search = $request->input('search');

    // Filtrar productos según el término de búsqueda y aplicar paginación
    $productos = Producto::when($search, function($query, $search) {
        $query->where('nombre', 'LIKE', "%$search%")
              ->orWhere('marca', 'LIKE', "%$search%");
    })->paginate(10); 

    // Retornar los datos a la vista
        return view('productos.gestionar', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.registro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'marca' => $request->marca,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
        ]);

        if(!$producto){
            // echo "Eror al registrar producto D':";
            return redirect()->route('producto.create')->with('error', 'Error al registrar producto.');
        }
        // echo "Producto registrado con exito :D";
        return redirect()->route('producto.index')->with('success', 'Producto registrado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::where('id', $id)->first();
        return view('productos.editar', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return redirect()->route('producto.index')->with('error', 'Producto no encontrado.');
        }
    
        $producto->nombre = $request->nombre;
        $producto->marca = $request->marca;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
    
        $producto->save();
    
        if ($producto->wasChanged()) {
            return redirect()->route('producto.index')->with('success', 'Producto actualizado correctamente.');
        } else {
            return redirect()->route('producto.index')->with('info', 'No se realizaron cambios al producto.');
        }    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::where('id', $id)->delete();
        if (!$producto){
            // echo "Error al eliminar D:";
            return redirect()->route('producto.index')->with('error', 'Error al eliminar el producto.');;
        };
        // echo "Producto eliminado :D";
        return redirect()->route('producto.index')->with('success', 'Producto eliminado con éxito.');;
    }
}
