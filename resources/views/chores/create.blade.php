@extends('layouts.app', ['active' => 'chores'])

@section('content')
<div class="container">
    @include('errors')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new Chore</div>

                <div class="card-body">

                    <form method="POST" action="/chores">
                        <div class="col-lg-8">
                            @csrf
                            <div class="form-group">
                                <label for="title">Chore Title</label>
                                <input class="form-control" type="text" name="title" placeholder="Chore Title">
                            </div>
                            <div class="form-group">
                                <label for="description">Chore Description</label>
                                <textarea class="form-control" type="text" name="description" placeholder="Chore Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="frequency_id">Frequency</label>
                                <select class="form-control" name="frequency_id">
                                    @foreach ($frequencies as $key => $frequency)
                                    <option value="{{ $key }}">{{ $frequency }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="due_date">First Due Date</label>
                                <input class="form-control" type="text" name="due_date" value={{ Carbon\Carbon::now() }}>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Save Chore</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
