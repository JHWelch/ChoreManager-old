@extends('layouts.app')
@section('content')
@component('components.maincontainer')
    @component('components.card')
        @slot('header')
            Chores {{-- {{ $digest_name }} --}}
        @endslot

        <ul>
            @foreach ($chores as $chore)
            <li><a href="/chores/{{ $chore->chore_id }}"> {{ $chore->title }} - {{ $chore->due_date }}</a></li>
            @endforeach
        </ul>

    @endcomponent
@endcomponent
@endsection
