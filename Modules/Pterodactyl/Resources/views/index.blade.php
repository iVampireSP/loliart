@extends('layouts.app')

@section('content')
    <livewire:pterodactyl::create />
    <p>
        This view is loaded from module: {!! config('pterodactyl.name') !!}
    </p>
@endsection
