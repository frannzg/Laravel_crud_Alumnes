@extends('layouts.app')

@section("content")

<div class="container mt-5">
    <div class="text-center">
        <h1>{{ __("Llistat d'alumnes") }}</h1>
        <a href="{{ route("alumne.create") }}" class="btn btn-primary">
            {{ __("Afegir alumne") }}
        </a>
    </div>

    <div class="mb-3">
        <a href="http://127.0.0.1:8000/home" class="btn btn-secondary">Darrere</a>
    </div>

    <table class="table table-bordered mb-5 mt-5">
        <thead>
            <tr class="table-success">
                <th>{{ __("Id") }}</th>
                <th>{{ __("Nom") }}</th>
                <th>{{ __("Cognoms") }}</th>
                <th>{{ __("Data naixement") }}</th>
                <th>{{ __("Centre") }}</th>
                <th>{{ __("Ensenyament") }}</th> <!-- Nueva columna añadida -->
                <th>{{ __("Accions") }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($alumnes as $alumne)
            <tr>
                <th scope="row">{{ $alumne->id }}</th>
                <td>{{ $alumne->nom }}</td>
                <td>{{ $alumne->cognoms }}</td>
                <td>{{ date_format(new DateTime($alumne->data_naixement), "d/m/Y") }}</td>
                <td>{{ $alumne->centre->nom ?? __('No especificat') }}</td>
                <td>{{ $alumne->ensenyament->nom ?? __('No especificat') }}</td> <!-- Mostrar el ensenyament -->
                <td>
                    <a href="{{ route("alumne.edit", ["alumne" => $alumne]) }}" class="btn btn-warning">{{ __("Editar") }}</a> 
                    <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-project-{{ $alumne->id }}-form').submit();">{{ __("Eliminar") }}</a>
                    <form id="delete-project-{{ $alumne->id }}-form" action="{{ route("alumne.destroy", ["alumne" => $alumne]) }}" method="POST" class="hidden">
                        @method("DELETE")
                        @csrf
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">
                    <div class="text-center" role="alert">
                        <p><strong class="font-bold">{{ __("No hi ha alumnes") }}</strong></p>
                        <span>{{ __("No hi ha cap dada a mostrar") }}</span>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $alumnes->links() !!}
    </div>
</div>

@endsection
