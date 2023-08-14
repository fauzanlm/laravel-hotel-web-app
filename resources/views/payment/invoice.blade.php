@extends('layouts.template')

@section('content')
<section class="accomodation_area section_gap">
<div class="container">
    <div class="col-md-12">
        <div class="section-heading">
            <h2>
                <center>
                    Invoice {{ ucfirst($pay->type) }}
                </center>
            </h2>
        </div>
    </div>
        <center>

            {!! QrCode::size(200)->generate($pay->url) !!}
            <br>
            No : {{ $pay->nomor }}
            <div class="table-responsive">
                <table class="table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>@currency($totalHarga)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- {{Route::currentRouteName() }} --}}
            @if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'customer.transactions')
                <div class="btn-group">

                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-warning mt-2">Back</a>
                    <button type="button" class="btn btn-sm btn-success  mt-2" data-toggle="modal" data-target="#uploadProof">
                        Upload Bukti
                    </button>
                </div>
            @else
            <div class="mt-2 col-md-3">

                <div class="btn-group">
                    <a href="{{ route('landing') }}" class="btn btn-sm btn-warning ">Back To Home</a>
                    <a href="{{ route('customer.transactions') }}" class="btn btn-sm btn-primary ">List Transactions</a>
                </div>
                <button type="button" class="btn btn-sm btn-success  mt-2" data-toggle="modal" data-target="#uploadProof">
                    Upload Proof
                </button>
            </div>

            @endif
        </center>
    </div>
    <div class="modal fade" id="uploadProof" tabindex="-1" role="dialog" aria-labelledby="uploadProofLabel" aria-hidden="true">
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
                {{-- {{ $idPayment }} --}}
                <input type="hidden" name="payment_id" value="{{ $idPayment }}">
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
</section>
@endsection
@section('script')
    <script>
        document.getElementById('store').storeID.onchange = function() {
            var newaction = this.value;
            document.getElementById('store').action = newaction;
        };
    </script>
@endsection
