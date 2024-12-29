@extends('layouts.dashboard')
@section('content')
    @livewire('user.notifications', ['user' => $user])
@endsection
