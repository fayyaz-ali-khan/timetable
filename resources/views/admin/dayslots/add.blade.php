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
                    <form action="{{ route('classes.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="name"
                                    placeholder="classes name" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="start_tim">Course</label>
                            <div class="col-sm-10">
                                <select name="course_id" id="start_tim" class="form-select">


                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="start_t">Academic Periods</label>
                            <div class="col-sm-10">
                                <select name="academic_period_id" id="start_t" class="form-select">


                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Avilable Rooms</label>
                            <div class="col-sm-10">
                                <select name="room_id" id="start_time" class="form-select">


                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Size</label>
                            <div class="col-sm-10">
                                <input type="number" id="basic-default-phone" name="size"
                                    class="form-control phone-mask" placeholder="classes size in number"
                                    aria-label="658 799 8941" aria-describedby="basic-default-phone" />
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
