@extends('layouts.dashboard')
@section('title', 'Draggable To-Do Tasks')
@section('content')
    <style>
        .timeline-label::before {
            right: 0px !important;
        }
    </style>
    @livewire('user.learning-paths.subtask-view', ['task' => $task, 'subtask_to_view' => $subtask_to_view])
@endsection
