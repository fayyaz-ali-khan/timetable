@extends('admin.layouts.app')

@section('content')
<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">ADD Classes</h5> <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
          @if (session('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif
          <form action="{{route('classes.update',$classes->id)}}" method="POST">
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="basic-default-name" value="{{$classes->name}}" name="name" placeholder="classes name" />
              </div>
            </div>
            
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-phone">Size</label>
              <div class="col-sm-10">
                <input type="number" id="basic-default-phone" value="{{$classes->size}}" name="size" class="form-control phone-mask" placeholder="classes size in number" aria-label="658 799 8941" aria-describedby="basic-default-phone" />
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endsection