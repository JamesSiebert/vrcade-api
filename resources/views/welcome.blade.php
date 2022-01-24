
@extends('app')


@section('content')
    <p>This is my body content.</p>

    <ul>
        <li><a href="{{ url('checkins') }}">View all Checkins List</a></li>
        <li><a href="{{ url('credits') }}">View all Credits</a></li>
        <li><a href="{{ url('scores') }}">View all Scores List</a></li>
        <li><a href="{{ url('checkins_export') }}">Download all checkins as XLSX</a></li>
        <li><a href="{{ url('credits_export') }}">Download all credits as XLSX</a></li>
        <li><a href="{{ url('scores_export') }}">Download all scores as XLSX</a></li>
    </ul>

    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>

    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
    You can find the latest builds and updates and more team info on our <a href="https://jamessiebert.itch.io/vrcade"><b>Itch.io Page</b></a>
    </div>

@endsection
