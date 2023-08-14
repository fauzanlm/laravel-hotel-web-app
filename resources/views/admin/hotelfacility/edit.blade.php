@extends('layouts.adminlte')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">HOTEL FACILITY EDIT</h3>

    </div>
    <div class="card-body">

        <form action="{{ route('hotelfacility.update', $data->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="facility_name">Facility Name</label>
                <input id="facility_name" value="{{ $data->facility_name }}" name="facility_name" type="text" class="form-control @error('facility_name') is-invalid @enderror" value="{{ old('facility_name') }}" required autocomplete="facility_name" autofocus>

                @error('facility_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="detail">Description</label>
                <textarea name="detail" class="form-control @error('detail') is-invalid @enderror" id="detail" rows="3" required autocomplete="detail" autofocus>{{ old('detail') }}{{$data->detail}}</textarea>

                @error('detail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group float-right row mb-0">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">
                        {{ __('update') }}
                    </button>

                </div>
            </div>
        </form>

    </div>
    <!-- /.card-footer -->
  </div>


@endsection
