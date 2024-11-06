@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1>{{ __("Llistat de Centres") }}</h1>
        <a href="{{ route('centre.create') }}" class="btn btn-primary">
            {{ __("Afegir Centre") }}
        </a>
    </div>

    <div class="mb-3">
        <a href="{{ url('/home') }}" class="btn btn-secondary">Darrere</a>
    </div>

    <table class="table table-bordered mb-5 mt-5">
        <thead>
            <tr class="table-success">
                <th>{{ __("Id") }}</th>
                <th>{{ __("Nom") }}</th>
                <th>{{ __("Accions") }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($centres as $centre)
                <tr>
                    <th scope="row">{{ $centre->id }}</th>
                    <td>{{ $centre->nom }}</td>
                    <td>
                        <a href="{{ route('centre.edit', $centre) }}" class="btn btn-warning">{{ __("Editar") }}</a> 
                        <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-centre-{{ $centre->id }}-form').submit();">{{ __("Eliminar") }}</a>
                        <form id="delete-centre-{{ $centre->id }}-form" action="{{ route('centre.destroy', $centre) }}" method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">
                        <strong class="font-bold">{{ __("No hi ha centres") }}</strong>
                        <span>{{ __("No hi ha cap dada a mostrar") }}</span>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $centres->links() !!}
    </div>
</div>
@endsection
