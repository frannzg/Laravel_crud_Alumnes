<?php

namespace App\Http\Controllers;

use App\Models\Ensenyament;
use Illuminate\Http\Request;

class EnsenyamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Usar el nombre correcto de la variable
         $ensenyaments = Ensenyament::paginate(10);
         return view('ensenyament', compact('ensenyaments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ensenyament.create', [
            'route' => route('ensenyament.store'),
            'title' => __('Crear Ensenyament'),
            'textButton' => __('Afegir Ensenyament')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        Ensenyament::create($request->all());
        return redirect()->route('ensenyament.index')->with('success', __('Ensenyament creat correctament.'));
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
    public function edit(Ensenyament $ensenyament)
    {
        $update = true;
        $title = __("Editar ensenyament");
        $textButton = __("Actualitzar");
        $route = route("ensenyament.update", ["ensenyament" => $ensenyament]);
        $ensenyaments = Ensenyament::all();
        return view("ensenyament.edit", compact("update", "title", "textButton", "route", "ensenyaments"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ensenyament $ensenyament)
    {
        $this->validate($request, [
            "nom" => "required",
        ]);
        $ensenyament->update($request->all());
        return back()
            ->with("success", __("El ensenyament " . $request->nom .  " s'ha actualitzat correctament!"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ensenyament $ensenyament)
    {
        $ensenyament->delete();
        return redirect()->route('ensenyament.index')->with('success', __('ensenyament eliminat correctament.'));
    }
}
