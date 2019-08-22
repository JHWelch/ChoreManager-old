@extends('layouts.app')

@section('content')
    @component('components.maincontainer')
        @component('components.card')
            @slot('header')
            Chores
            @endslot
                <ul>
                    @foreach ($chores as $chore)
                    <li><a href="/chores/{{ $chore->id }}"> {{ $chore->title }}</a></li>
                    @endforeach
                </ul>

                <div>
                    <a class="btn btn-primary" href="/chores/create" title="Create New Chore Link">Create New Chore</a>
                </div>
        @endcomponent
    @endcomponent
@endsection
