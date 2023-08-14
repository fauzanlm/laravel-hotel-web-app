@extends('layouts.adminlte')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">ROOM EDIT</h3>
      <!-- /.card-tools -->
      <div class="card-tools">
          <!-- Buttons, labels, and many other things can be placed here! -->
          <!-- Here is a label for example -->

          {{-- <a href="{{ route('admin.room.room.add') }}" class="badge badge-primary mr-2">add</a> --}}
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form action="{{ route('room.update', $data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row">

                <div class="form-group col-md-6">
                    <label for="type_id">Type</label>
                    <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror" value="{{ old('type_id') }}" required autocomplete="type_id" autofocus>
                        @foreach ($typeRooms as $type)
                            <option {{ ($type->id == $data->id) ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
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
                    <input id="number" value="{{ $data->number }}" name="number" type="text" class="form-control @error('number') is-invalid @enderror" value="{{ old('number') }}" required autocomplete="number" autofocus>

                    @error('number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status') }}" required autocomplete="status" autofocus>
                    <option {{ $data->status == "a" ? 'selected' : ''}} value="a">Available</option>
                    <option {{ $data->status == "r" ? 'selected' : ''}} value="r">Reserve</option>
                    <option {{ $data->status == "o" ? 'selected' : ''}} value="o">Occupied</option>
                    <option {{ $data->status == "os" ? 'selected' : ''}} value="os">Out of Service</option>
                </select>
                @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
