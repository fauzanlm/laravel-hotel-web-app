@extends('layouts.adminlte')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">FACILITY ROOM LIST</h3>
      <!-- /.card-tools -->
      <div class="card-tools">
          <!-- Buttons, labels, and many other things can be placed here! -->
          <!-- Here is a label for example -->

          <a href="{{ route('roomfacility.create') }}" class="badge badge-primary mr-2">add</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="facilityRoomlist" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Facility Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $dt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->facility_name }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('roomfacility.edit', $dt->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ route('roomfacility.delete', $dt->id) }}" onclick="return confirm('Yakin?')" class="btn btn-sm btn-danger">Delete</a>
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
        $(function () {
            $("#facilityRoomlist").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#facilityRoomlist_wrapper .col-md-6:eq(0)');
        });
    </script>
  @endsection
@endsection
