<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use Illuminate\Http\Request;

class CentreController extends Controller
{
    public function index()
    {
        $centres = Centre::paginate(10);
        return view('centre', compact('centres'));
    }

    public function create()
    {
        return view('centre.create', [
            'route' => route('centre.store'),
            'title' => __('Crear Centre'),
            'textButton' => __('Afegir Centre')
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        Centre::create($request->all());
        return redirect()->route('centre.index')->with('success', __('Centre creat correctament.'));
    }

    /**
     * Mostrar el formulario para editar un centro existente.
     */
    public function edit(Centre $centre)
{
    $update = true;
    $title = __("Editar centre");
    $textButton = __("Actualitzar");
    $route = route("centre.update", ["centre" => $centre]);
    $centres = Centre::all();
    return view("centre.edit", compact("centre", "update", "title", "textButton", "route", "centres"));
}


    /**
     * Actualizar un centro en la base de datos.
     */
    public function update(Request $request, Centre $centre)
    {
        $this->validate($request, [
            "nom" => "required",
        ]);
        $centre->update($request->all());
        return back()
            ->with("success", __("El centre " . $request->nom .  " s'ha actualitzat correctament!"));
    }

    public function destroy(Centre $centre)
    {
        $centre->delete();
        return redirect()->route('centre.index')->with('success', __('Centre eliminat correctament.'));
    }
}
