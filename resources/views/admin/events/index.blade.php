@extends('layouts.admin')


@section('content')
<!--Section Card-->
<div class="container">
    <h1 class="text-center"><strong>Benvenuto</strong></h1>
    <div class="row">
        @foreach ($events as $event)
        <div class="col-4">
            <div class="card mb-3">
                <img src="{{ $event->image }}" class="card-img-top " alt="...">
                <div class="card-body">
                    <h5 class="card-title"><strong>{{ $event->name }} </strong></h5>
                    <p class="card-text">{{ $event->location }}</p>
                    <p class="card-text"><strong>Data evento</strong> {{ $event->date }}</p>
                    <span class="d-flex gap-2 ">
                        <a href="{{route('admin.events.show', $event->id)}}" class="btn btn-primary ">Dettagli</a>
                        <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-warning ">Modifica</a>
                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST"
                            class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Cancella" class="btn btn-danger">
                        </form>

                    </span>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection