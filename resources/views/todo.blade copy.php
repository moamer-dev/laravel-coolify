@extends('layouts.dashboard')

@section('title', 'Draggable To-Do Tasks')

@push('headerScripts')
    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.8/lib/draggable.bundle.js"></script>
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">To-Do Tasks</h3>
        </div>
        <div class="card-body">
            <ul id="todo-list" class="list-group">
                <li class="list-group-item">Task 1</li>
                <li class="list-group-item">Task 2</li>
                <li class="list-group-item">Task 3</li>
                <li class="list-group-item">Task 4</li>
            </ul>
        </div>
    </div>
@endsection

@push('footerScripts')
    <script>
        // Initialize Draggable.js
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('#todo-list');
            new Draggable.Sortable(container, {
                draggable: '.list-group-item',
                mirror: {
                    constrainDimensions: true,
                },
            });
        });
    </script>
@endpush
