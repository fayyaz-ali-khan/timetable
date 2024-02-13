@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">edit Period</h5> <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('timeslots.update', $timeslot->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-time">Time</label>
                            <div class="col-sm-10">
                                <select name="start_time" id="start_time" class="form-select">
                                    @for ($hour = 0; $hour < 24; $hour++)
                                        @for ($minute = 0; $minute < 60; $minute += 15)
                                            @php
                                                $time = sprintf('%02d:%02d', $hour, $minute);
                                                $selected = $time == $start_time ? 'selected' : '';
                                            @endphp
                                            <option value="{{ $time }}" {{ $selected }}>{{ $time }}
                                            </option>
                                        @endfor
                                    @endfor
                                </select>
                                -
                                <select name="end_time" id="end_time" class="form-select">
                                    @for ($hour = 0; $hour < 24; $hour++)
                                        @for ($minute = 0; $minute < 60; $minute += 15)
                                            @php
                                                $time = sprintf('%02d:%02d', $hour, $minute);
                                                $selected = $time == $end_time ? 'selected' : '';
                                            @endphp
                                            <option value="{{ $time }}" {{ $selected }}>{{ $time }}
                                            </option>
                                        @endfor
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-rank">Rank</label>
                            <div class="col-sm-10">
                                <input type="number" id="basic-default-rank" name="rank" class="form-control"
                                    placeholder="Rank" aria-label="Rank" aria-describedby="basic-default-rank"
                                    value="{{ $timeslot->rank }}" />
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
