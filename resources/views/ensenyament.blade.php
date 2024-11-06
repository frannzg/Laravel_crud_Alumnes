@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h1>{{ __("Llistat de Ensenyaments") }}</h1>
        <a href="{{ route('ensenyament.create') }}" class="btn btn-primary">
            {{ __("Afegir Ensenyament") }}
        </a>
    </div>

    <div class="mb-3">
        <a href="{{ url('/home') }}" class="btn btn-secondary">Darrere</a>
    </div>

    <table class="table table-bordered mb-5 mt-3">
        <thead>
            <tr class="table-success">
                <th>{{ __("Id") }}</th>
                <th>{{ __("Nom") }}</th>
                <th>{{ __("Accions") }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ensenyaments as $ensenyament)
                <tr>
                    <th scope="row">{{ $ensenyament->id }}</th>
                    <td>{{ $ensenyament->nom }}</td>
                    <td>
                        <a href="{{ route('ensenyament.edit', $ensenyament) }}" class="btn btn-warning">{{ __("Editar") }}</a> 
                        <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-ensenyament-{{ $ensenyament->id }}-form').submit();">{{ __("Eliminar") }}</a>
                        <form id="delete-ensenyament-{{ $ensenyament->id }}-form" action="{{ route('ensenyament.destroy', $ensenyament) }}" method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">
                        <strong>{{ __("No hi ha ensenyaments") }}</strong>
                        <span>{{ __("No hi ha cap dada a mostrar") }}</span>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Paginació --}}
    <div class="d-flex justify-content-center">
        {!! $ensenyaments->links() !!}
    </div>
</div>
@endsection
