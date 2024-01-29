@extends('layout.app')

@section('content')
@if (session()->has('success'))
<div class="alert alert-success" style="display: flex; align-items: center;">
    {{ session()->get('success') }}
    <button type="button" class="close" aria-hidden="true" style="margin-left: auto; margin-right: 0;"
        onclick="this.parentElement.style.display='none'">X</button>
</div>
@elseif (session()->has('error'))
<div class="alert alert-danger" style="display: flex; align-items: center;">
    {{ session()->get('error') }}
    <button type="button" class="close" aria-hidden="true" style="margin-left: auto; margin-right: 0;"
        onclick="this.parentElement.style.display='none'">x</button>
</div>
@endif
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>Tasks</b></h2>
                </div>
                <div class="col-sm-6 text-right">
                    <button class="btn btn-success btn-regular align-items-center" type="button" data-toggle="modal"
                        data-target="#addTask">
                        <i class="bi bi-patch-plus" style="margin-right: 7px;"></i> Add task
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-center">
                <table class="table table-hover table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Status</th>
                            {{-- <th scope="col">Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach ($tasks as $task)
                        <tr>
                            <td>
                                {{ $i++ }}
                            </td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                                <button class="badge badge-{{ $task->priority == 1 ? 'danger' : 'warning' }}"
                                    data-id="{{ $task->id }}" onclick="updatePriority(event)">
                                    {{ $task->priority == 1 ? 'High' : 'Low' }}

                                </button>
                            </td>
                            <td>{{ $task->due_date }}</td>
                            <td>
                                <a href="task/{{ $task->id }}"
                                    class="badge badge-{{ $task->completed ? 'success' : 'danger' }}">
                                    {{ $task->completed ? 'Completed' : 'Incomplete' }}
                                    @if($task->completed)
                                    <i class="bi bi-check-circle-fill ml-1" style="color: black"></i>
                                    @else
                                    <i class="bi bi-exclamation-triangle-fill ml-1" style="color: black"></i>
                                    @endif
                                </a>
                            </td>
                            {{-- <td>hi</td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>

</div>

@include('tasks.create')


@endsection
