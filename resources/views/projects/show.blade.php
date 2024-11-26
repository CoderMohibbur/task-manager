@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-4xl font-bold text-yellow-500 mb-5">{{ $project->name }}</h2>
    <p class="text-lg">{{ $project->description }}</p>
</div>
@endsection
