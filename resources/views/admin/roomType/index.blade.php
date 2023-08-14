@extends('layouts.adminlte')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">ROOM TYPE LIST</h3>
      <!-- /.card-tools -->
      <div class="card-tools">
          <!-- Buttons, labels, and many other things can be placed here! -->
          <!-- Here is a label for example -->

          <a href="{{ route('roomtype.create') }}" class="badge badge-primary mr-2">add</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="facilityList" class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Information</th>
                    <th>Foto</th>
                    <th>Price</th>
                    <th>Facilities</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $dt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->name }}</td>
                        <td>{{ $dt->information }}</td>
                        <td>
                            <img src="{{ asset('images/tipekamar/'.$dt->foto) }}" width="100px" alt="">
                        </td>
                        <td>{{ $dt->price }}</td>
                        <td>{{ $dt->facilities }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('roomtype.edit', $dt->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ route('roomtype.delete', $dt->id) }}" onclick="return confirm('Yakin?')" class="btn btn-sm btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- /.card-footer -->
  </div>

  @section('js')
    <script>
        $(function() {
            $("#facilityList").DataTable({
                "responsive": true,
                "paging" : false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#facilityList_wrapper .col-md-6:eq(0)');
        });
    </script>
  @endsection
@endsection
