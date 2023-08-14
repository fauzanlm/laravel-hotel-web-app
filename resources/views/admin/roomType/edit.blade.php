@extends('layouts.adminlte')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">ROOM TYPE EDIT</h3>
      <!-- /.card-tools -->
      <div class="card-tools">
          <!-- Buttons, labels, and many other things can be placed here! -->
          <!-- Here is a label for example -->

          {{-- <a href="{{ route('admin.facility.add') }}" class="badge badge-primary mr-2">add</a> --}}
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form action="{{ route('roomtype.update', $data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" value="{{ $data->name }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="facilities">facilities</label>
                {{-- {{ $roomFacilities }} --}}
                {{-- {{ $data->facilities[0] }} --}}
                    @foreach ($roomFacilities as $item)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" {{ in_array($item->facility_name, $data->facilities) ? 'checked' : ''}} name="facilities[]" value="{{ $item->facility_name }}" id="{{$item->id}}">
                            <label class="form-check-label" for="{{ $item->id }}">
                                {{$item->facility_name}}
                            </label>
                        </div>
                        {{-- <input id="facilities" name="facilities" type="text" class="form-control @error('facilities') is-invalid @enderror" value="{{ old('facilities') }}" required autocomplete="facilities" autofocus> --}}

                        @error('facilities')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    @endforeach
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input id="price" value="{{ $data->price }}" name="price" type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required autocomplete="price" autofocus>

                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="foto">Foto</label>
                <img src="{{ asset('images/tipekamar/'.$data->id) }}" width="150px" alt="">
                <input id="foto" name="foto" type="file" class="form-control @error('foto') is-invalid @enderror" autocomplete="foto" autofocus>

                @error('foto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="information">Information</label>
                <textarea name="information" class="form-control @error('information') is-invalid @enderror" id="information" rows="3" required autocomplete="information" autofocus>{{ old('information') }}{{ $data->information }}</textarea>
                @error('information')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



            <div class="form-group float-right row mb-0">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">
                        {{ __('Update') }}
                    </button>

                </div>
            </div>
        </form>

    </div>
    <!-- /.card-footer -->
  </div>


@endsection
