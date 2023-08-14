@extends('layouts.template')

@section('content')
<section class="accomodation_area section_gap">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="section-heading">
                <h2>
                    <center>
                        Daftar Transaksi
                    </center>
                </h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>Type Kamar</th>
                            <th>Nomor Kamar</th>
                            <th>Jumlah Pesanan</th>
                            <th>Harga Permalam</th>
                            <th>Total Harga</th>
                            <th>Status Transaksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($datas == '[]')
                            <tr class="text-center table-primary">
                                <td colspan="7">Tidak ada transaksi</td>

                            </tr>
                        @else

                            @foreach ($datas as $item)

                                <tr class="text-center table-primary">
                                    <td>{{ $item->room->roomType->name }}</td>
                                    <td>{{ $item->roomNumber->number }}</td>
                                    <td>{{ $item->many_room }}</td>
                                    <td>@currency($item->room->roomType->price)</td>
                                    <td>@currency($item->payment->price)</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        @if ($item->status == 'canceled')
                                            Transaction Canceled
                                        @elseif ($item->status == 'process')
                                            Transaction on Process
                                        @elseif ($item->status == 'verified')
                                            <a href="{{ route('transaction.proof', $item->id) }}" class="btn btn-sm btn-success">Print Proof</a>
                                        @elseif ($item->status == 'failed')
                                            Transaction Failed
                                        @elseif ($item->status == 'rejected')
                                            Your proof has been rejected by Receptionis, <br>please upload your proof again!
                                            <a data-toggle="modal" data-target="#{{ 'uploadProof'.$item->id }}" class="btn btn-sm btn-primary text-white">Upload Proof</a>
                                            <div class="modal fade" id="{{ 'uploadProof'.$item->id }}" tabindex="-1" role="dialog" aria-labelledby="uploadProofLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="uploadProofLabel">Upload your payment proof</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    <form action="{{ route('upload.proof') }}" method="post" enctype="multipart/form-data">
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

                                                            <button type="submit" class="btn btn-sm btn-primary">Pay</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @elseif($item->status == 'checked in')
                                            Checked In on {{ $item->updated_at }}
                                        @elseif($item->status == 'checked out')
                                            Checked Out on {{ $item->updated_at }}
                                        @else
                                            <div class="btn-group">
                                                <a href="{{ route('customer.cancel.transaction', $item->id) }}" onclick="return confirm('Yakin ingin membatalkan transaksi ini?')" class="btn btn-sm btn-danger">Cancel</a>
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#payType">
                                                    Pay
                                                </button>
                                            </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="payType" tabindex="-1" role="dialog" aria-labelledby="payTypeLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="payTypeLabel">Select Payment Type</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        <form action="{{ route('customer.pay.transaction', $item->id) }}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-row">

                                                                    <select name="pay_type" id="pay_type" class="form-control col-md-12 @error('pay_type') is-invalid @enderror" value="{{ old('pay_type') }}" required autocomplete="pay_type" autofocus>
                                                                        <option value="dana">DANA</option>
                                                                        <option value="ovo">OVO</option>
                                                                        <option value="gopay">GOPAY</option>
                                                                        <option value="mandiriva">Mandiri VA</option>
                                                                        <option value="briva">BRI VA</option>
                                                                        <option value="bcava">BCA VA</option>
                                                                    </select>
                                                                    @error('pay_type')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>

                                                                <button type="submit" class="btn btn-sm btn-primary">Pay</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div>
                <a href="{{ route('landing') }}" class="btn btn-md btn-warning float-right mx-2">Back To Home</a>
                @if ($pay != '0')

                <button type="button" class="btn btn-md btn-success float-right" data-toggle="modal" data-target="#payAllType">
                    Pay All
                </button>
                @endif


                <div class="modal fade" id="payAllType" tabindex="-1" role="dialog" aria-labelledby="payAllTypeLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="payAllTypeLabel">Select Payment Type</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <form action="{{ route('customer.invoice') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-row">

                                            <select name="pay_type" id="pay_type" class="form-control col-md-12 @error('pay_type') is-invalid @enderror" value="{{ old('pay_type') }}" required autocomplete="pay_type" autofocus>
                                                <option value="dana">DANA</option>
                                                <option value="ovo">OVO</option>
                                                <option value="gopay">GOPAY</option>
                                                <option value="mandiriva">Mandiri VA</option>
                                                <option value="briva">BRI VA</option>
                                                <option value="bcava">BCA VA</option>
                                            </select>
                                            @error('pay_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-sm btn-primary">Pay</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
