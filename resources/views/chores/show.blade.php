@extends('layouts.app', ['active' => 'chores'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $chore->title }} - {{ $chore->frequencyName }}</div>

                <div class="card-body">
                    <p>{{ $chore->description }}</p>
                    <ul>
                        @foreach ($instances as $instance)
                        <li>{{ $instance->due_date }}</li>
                        @endforeach
                    </ul>

                    <a class="btn btn-primary" href="\chores\{{ $chore->id }}\edit" title="Edit Chore">Edit</a>
                    <form method="POST" action="\chores\{{ $chore->id }}" class="mt-2">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete Chore</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
