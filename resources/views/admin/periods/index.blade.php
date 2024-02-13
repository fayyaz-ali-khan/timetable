@extends('admin.layouts.app')

@section('content')
<!-- Basic Bootstrap Table -->
<div class="card">
    <h5 class="card-header">Periods</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Time</th>
            <th>Slot</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @if (session('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif
          @foreach($timeslot as $slot)
          <tr>
            <td>{{$slot->id}}</td>
            <td>{{$slot->time}}</td>
            <td>{{$slot->rank}}</td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('timeslots.create')}}"><i class="bx bx-plus me-1"></i> Add</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
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
