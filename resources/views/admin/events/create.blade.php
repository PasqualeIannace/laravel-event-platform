@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2 class="mt-3 text-center">Crea un evento</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="row">
        <form method="POST" action="{{ route('admin.events.store') }} " method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome evento</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Luogo</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location"
                    name="location" value="{{ old('location') }}">
                @error('location')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">URL immagine</label>
                <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                    value="{{ old('image') }}">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tickets" class="form-label">Numero tickets</label>
                <input type="number" class="form-control @error('tickets') is-invalid @enderror" id="tickets"
                    name="tickets" value="{{ old('tickets') }}">
                @error('tickets')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Data</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date"
                    value="{{ old('date') }}">
                @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <h5>Sponsor</h5>
                @foreach ($tags as $tag)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tags[]" id="{{ $tag->id }}"
                        value="{{ $tag->id }}">
                    <label class="form-check-label" for="{{ $tag->id }}">{{ $tag->sponsor
                        }}</label>
                </div>
                @endforeach
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Inserisci</button>
            </div>
        </form>
    </div>
</div>
@endsection