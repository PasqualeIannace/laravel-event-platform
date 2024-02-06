@extends('layouts.admin')


@section('content')
<!--Section Card-->
<div class="container">
    <h1 class="text-center"><strong>Dettagli su {{$event->name}}</strong></h1>
    <div class="row">
        <div class="col-12">

            <img src="{{ $event->image }}" class="img-fluid" alt="Responsive Image">
            <div>
                <h5><strong>{{$event->name}} </strong></h5>
                <p>{{ $event->location }}</p>
                <p><strong>Data evento</strong> {{ $event->date }}</p>
                <p><strong>Ticket disponibili</strong> {{ $event->tickets }}</p>
                {{-- <p><strong>Creato da: </strong> {{ $event->user->name }}</p> --}}

                <h4>Ringraziamo gli sponsor</h4>
                <ul>
                    @foreach ($event->tags as $tag)
                    <li>{{ $tag->sponsor }}</li>
                    @endforeach
                </ul>

                <span class="d-flex gap-2 "></span>
            </div>

        </div>
    </div>
</div>
@endsection