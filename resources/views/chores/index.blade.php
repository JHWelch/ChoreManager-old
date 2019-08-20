@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Chores</div>

                <div class="card-body">
                    <ul>
                        @foreach ($chores as $chore)
                        <li><a href="/chores/{{ $chore->id }}"> {{ $chore->title }}</a></li>
                        @endforeach
                    </ul>

                    <div>
                        <a class="btn btn-primary" href="/chores/create" title="Create New Chore Link">Create New Chore</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
