@extends('admin.layouts.app')

@section('content')
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Classes</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>Size</th>
                        {{-- <th>Status</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($classes as $class)
                        <tr>
                            <td>{{ $class->id }}</td>
                            <td>{{ $class->name }}</td>
                            <td>
                                {{ $class->size }}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('classes.add') }}"><i
                                                class="bx bx-plus me-1"></i> Add</a>
                                        <a class="dropdown-item" href="{{ route('classes.edit', $class->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="#"
                                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this class?')) { document.getElementById('delete-classes-{{ $class->id }}').submit(); }">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </a>
                                        <form id="delete-classes-{{ $class->id }}"
                                            action="{{ route('classes.destroy', $class->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
@endsection
