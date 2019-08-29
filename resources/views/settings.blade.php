@extends('layouts.app', ['active' => 'settings'])

@section('content')
@component('components.maincontainer')
<h1>Settings</h1>


    @component('components.card')
    @slot('header')
        Notification Settings
    @endslot
        @foreach($notification_settings as $section)
            @foreach ($section as $setting)
                <p>{{ $setting }}</p>
            @endforeach
        @endforeach

    @endcomponent
@endcomponent
@endsection
