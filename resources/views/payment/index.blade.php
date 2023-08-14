@extends('layouts.template')

@section('content')
<section class="accomodation_area section_gap">

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>
              <center>
                  Pembayaran Kamar
              </center>
            </h2>
        </div>
      </div>


      <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>Nomor Kamar</th>
                                <th>Type Kamar</th>
                                <th>Jumlah Pesanan</th>
                                <th>Total Malam</th>
                                <th>Harga Permalam</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center table-primary">
                                <td>{{ $nomorKamar }}</td>
                                <td>{{ $dataType->name }}</td>
                                <td>{{ $jumlahPesanan }}</td>
                                <td>{{ $totalMalam }}</td>
                                <td>@currency($dataType->price)</td>
                                <td>@currency($totalHarga)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div>
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#payType">
                        Pay
                    </button>
                    <div class="modal fade" id="payType" tabindex="-1" role="dialog" aria-labelledby="payTypeLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="payTypeLabel">Select Payment Type</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <form action="{{ route('customer.pay.transaction', $transaction->id) }}" method="post">
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
</section>
@endsection
