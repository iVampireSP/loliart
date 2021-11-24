@extends('layouts.app')

@section('content')
    <h1>Hello World</h1>
    <livewire:pterodactyl::counter />
    <p>
        This view is loaded from module: {!! config('pterodactyl.name') !!}
    </p>
@endsection
