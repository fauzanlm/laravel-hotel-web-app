@extends('layouts.app')

@section('content')
<div class="container-fluid px-3">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>
                    <center>
                        Daftar Transaksi
                    </center>
                </h2>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                        {{-- <div class="table-responsive"> --}}
                            <table id="transaction" class="display" style="width:100%">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Customer Name</th>
                                        <th>Phone Number</th>
                                        <th>Type Kamar</th>
                                        <th>Jumlah Pesanan</th>
                                        <th>Check in - Check out</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Harga Permalam</th>
                                        <th>Total Harga</th>
                                        <th>Status Transaksi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @if ($datas == '[]')
                                    <tr class="text-center">
                                        <td colspan="10">Tidak ada transaksi</td>

                                    </tr>
                                    @else --}}

                                        @foreach ($datas as $item)

                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->user->phone }}</td>
                                            <td>{{ $item->room->roomType->name }}</td>
                                            <td>{{ $item->many_room }}</td>
                                            <td>{{ $item->check_in . ' - ' . $item->check_out}}</td>
                                            <td>{{ $item->created_at->diffForHumans() }}</td>
                                            <td>@currency($item->room->roomType->price)</td>
                                            <td>@currency($item->payment->price)</td>
                                            <td>{{ Str::ucfirst($item->status) }}</td>
                                            <td>
                                                @if ($item->status == 'canceled')
                                                    Transaction Canceled
                                                @elseif ($item->status == 'failed')
                                                    Transaction Failed
                                                @elseif ($item->status == 'process')

                                                    <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#{{ 'haha'.$item->id }}">Proof</a>

                                                    <div class="modal fade" id="{{ 'haha'.$item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">

                                                            <h4 class="modal-title" id="myModalLabel">Proof Image</h4>
                                                        </div>

                                                        <div class="modal-body">
                                                            <center>

                                                                <img width="400px" src="{{ asset('images/bukti/'.$item->payment->bukti) }}" alt="">
                                                            </center>
                                                        <div class="modal-footer">
                                                            <a onclick="return confirm('Change the status to Verified?')" class="btn btn-sm btn-success" href="{{ route('receptionis.toverified', $item->id) }}">Verified</a>
                                                            <a onclick="return confirm('Change the status to Rejected?')" class="btn btn-sm btn-danger" href="{{ route('receptionis.torejected', $item->id) }}">Reject</a>
                                                            <button type="button" class="btn btn-sm btn-secondary float-rigt" data-dismiss="modal">Close</button>
                                                        </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    </div>

                                                @elseif ($item->status == 'verified')
                                                    Transaction Success
                                                @elseif ($item->status == 'rejected')
                                                    Rejected
                                                @elseif($item->status == 'waiting for payment')
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{ '#uploadProof'.$item->id }}">
                                                        Upload Proof
                                                    </button>

                                                @elseif($item->status == 'checked in')
                                                    Checked In on {{ $item->updated_at }}
                                                @elseif($item->status == 'checked out')
                                                    Checked Out on {{ $item->updated_at }}
                                                @endif


                                         {{-- MODAL UPLOAD BUKTI --}}
                                         <div class="modal fade" id="{{ 'uploadProof'.$item->id }}" tabindex="-1" role="dialog" aria-labelledby="uploadProofLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="uploadProofLabel">Upload your payment proof</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                <form action="{{ route('receptionis.upload.proof') }}" method="post" enctype="multipart/form-data">
                                                    @csrf

                                                    <input type="hidden" name="payment_id" value="{{ $item->id }}">
                                                    <div class="modal-body">
                                                        <div class="form-row">

                                                            <div class="form-group col-md-12">
                                                                <label for="foto">Proof Image</label>
                                                                <input id="foto" name="foto" type="file" class="form-control @error('foto') is-invalid @enderror"  value="{{ old('foto') }}" required autocomplete="foto" autofocus>

                                                                @error('foto')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>

                                                            <button type="submit" class="btn btn-sm btn-primary">Send</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>



                                    </td>
                                </tr>
                                        @endforeach
                                    {{-- @endif --}}
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
        $("#transaction").DataTable({
            "responsive": true,
            "paging" : false,
            "dom": 'Bfrtip',
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        });
    });
</script>
@endsection
