@extends('layouts.app', ['active' => 'digest'])
@section('content')
@component('components.maincontainer')
    @component('components.card')
        @slot('header')
            Chores {{ $digest_name }}
        @endslot


        @foreach ($chores as $chore)
        <form method="POST" action="/chore_instance/{{ $chore->id }}/complete">
            @csrf
            <a href="/chores/{{ $chore->chore_id }}"> {{ $chore->title }} - {{ $chore->due_date }}</a>
            <button class="btn btn-primary" type="submit">Complete</button>
        </form>
        @endforeach


    @endcomponent
@endcomponent
@endsection
