@extends('layouts.app')

@section('content')
<div class="container">
    @include('errors')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit {{ $chore->title }}</div>

                <div class="card-body">
                    <form method="POST" action="/chores/{{ $chore->id }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="title">Chore Title</label>
                            <input class="form-control" type="text" name="title" placeholder="Chore Title" value="{{ $chore->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Chore Description</label>
                            <textarea class="form-control" type="text" name="description" placeholder="Chore Title">{{ $chore->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="frequency_id">Frequency</label>
                            <select class="form-control" name="frequency_id">
                                @foreach ($frequencies as $key => $frequency)
                                <option value="{{ $key }}" @if ($chore->frequency_id == $key) selected @endif>{{ $frequency }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-primary" type="submit">Save Chore</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
