@php
   if(Auth::user()->role === 'admin') {
      $layoutDirectory = 'layouts.adminlte';
   } elseif (Auth::user()->role === 'resepsionis') {
      $layoutDirectory = 'layouts.app';
   }
@endphp

@extends($layoutDirectory)
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>
                    <center>
                        Log Activities
                    </center>
                </h2>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                            @if (Auth::user()->role == 'admin')

                                <table id="log" class="table table-bordered" style="width:100%">
                            @else

                                <table id="log" class="display" style="width:100%">
                            @endif
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Log</th>
                                        <th>Transaction ID</th>
                                        <th>Executor ID</th>
                                        <th>Date Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($datas as $item)

                                            <tr class="text-center">

                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->log }}</td>
                                                <td>{{ $item->transaction_id }}</td>
                                                <td>{{ $item->executor_id }}</td>
                                                <td>{{ $item->created_at }}</td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')

<script>
    $(function() {
        $("#log").DataTable({
            "responsive": true,
            "paging" : false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#facilityList_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
@section('script')
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/jszip.min.js') }}"></script>
<script src="{{ asset('js/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script>
    $(function() {
        $("#log").DataTable({
            "responsive": true,
            "paging" : false,
            "dom": 'Bfrtip',
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        });
    });
</script>
@endsection
@endsection
