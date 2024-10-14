<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarroController extends Controller
{
    public function index()
    {
        $carros = Carro::with('marca')->get();
        return view('Carros.index', compact('carros'));
    }

    public function create()
    {
        $marcas = Marca::all(); // Traemos todas las marcas para el formulario
        return view('Carros.create', compact('marcas')); // Las enviamos a la vista
    }

    public function store(Request $request)
    {
        $request->validate([
            'modelo' => 'required|string|max:80',
            'color' => 'required|string|max:50',
            'precio' => 'required|numeric',
            'transmision' => 'required|string|max:50',
            'submarca' => 'required|string|max:80',
            'marca_id' => 'required|numeric',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Validación de archivo de imagen
        ]);

        // Manejar la carga de la imagen
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/fotos', $fileName); // Guardar en storage/app/public/fotos
        }

        // Crear el registro del carro con la imagen
        Carro::create([
            'modelo' => $request->input('modelo'),
            'color' => $request->input('color'),
            'precio' => $request->input('precio'),
            'transmision' => $request->input('transmision'),
            'submarca' => $request->input('submarca'),
            'marca_id' => $request->input('marca_id'),
            'foto' => isset($fileName) ? $fileName : null, // Guardar el nombre del archivo en la base de datos
        ]);

        return redirect()->route('carros.index')->with('success', 'Carro agregado');
    }

    public function edit(Carro $carro)
    {
        $marcas = Marca::all(); // Enviar las marcas para la edición
        return view('Carros.edit', compact('carro', 'marcas'));
    }

    public function update(Request $request, Carro $carro)
    {
        $request->validate([
            'modelo' => 'required|string|max:80',
            'color' => 'required|string|max:50',
            'precio' => 'required|numeric',
            'transmision' => 'required|string|max:50',
            'submarca' => 'required|string|max:80',
            'marca_id' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validación de archivo opcional
        ]);

        // Manejar la actualización de la imagen
        if ($request->hasFile('foto')) {
            // Eliminar la imagen anterior si existe
            if ($carro->foto) {
                Storage::delete('public/fotos/' . $carro->foto);
            }

            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/fotos', $fileName);
            $carro->foto = $fileName; // Actualizar el campo 'foto'
        }

        // Actualizar el registro del carro
        $carro->update([
            'modelo' => $request->input('modelo'),
            'color' => $request->input('color'),
            'precio' => $request->input('precio'),
            'transmision' => $request->input('transmision'),
            'submarca' => $request->input('submarca'),
            'marca_id' => $request->input('marca_id'),
            'foto' => isset($fileName) ? $fileName : $carro->foto, // Mantener la imagen anterior si no se cambia
        ]);

        return redirect()->route('carros.index')->with('success', 'Carro actualizado');
    }

    public function destroy(Carro $carro)
    {
        // Eliminar la imagen asociada si existe
        if ($carro->foto) {
            Storage::delete('public/fotos/' . $carro->foto);
        }

        // Eliminar el registro del carro
        $carro->delete();
        return redirect()->route('carros.index')->with('success', 'Carro eliminado correctamente');
    }
}
