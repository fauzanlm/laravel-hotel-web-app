@extends('layouts.adminlte')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">ROOM ADD</h3>
      <!-- /.card-tools -->
      <div class="card-tools">
          <!-- Buttons, labels, and many other things can be placed here! -->
          <!-- Here is a label for example -->

          {{-- <a href="{{ route('admin.room.room.add') }}" class="badge badge-primary mr-2">add</a> --}}
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form action="{{ route('room.store') }}" method="post">
            @csrf
            <div class="row">

                <div class="form-group col-md-6">
                    <label for="type_id">Type</label>
                    <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror" value="{{ old('type_id') }}" required autocomplete="type_id" autofocus>
                        <option disabled selected>Select Type of Room...</option>
                        @foreach ($typeRooms as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>

                    @error('type_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="number">Number</label>
                    <input id="number" name="number" type="text" class="form-control @error('number') is-invalid @enderror" value="{{ old('number') }}" required autocomplete="number" autofocus>

                    @error('number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group float-right row mb-0">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Post') }}
                    </button>

                </div>
            </div>
        </form>

    </div>
    <!-- /.card-footer -->
  </div>


@endsection
