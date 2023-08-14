<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pembayaran Hotel Hebat</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <hr>
                <h3 class="text text-primary fw-bold">HOTEL HEBAT</h3>
                <h6>Payment Receipt</h6>
                <p>Jl. Mana aja No 07 California 177854 (+1) 234-1233</p>
                <hr>
                    <div class="row">
                        <h6 class="card-subtitle mb-2 col-6">Transaction ID</h6>
                        <h6 class="card-subtitle mb-2 col-6">: {{ $data->id }}</h6>
                        <h6 class="card-subtitle mb-2 col-6">Client Name</h6>
                        <h6 class="card-subtitle mb-2 col-6">: {{ $data->user->name }}</h6>
                        <h6 class="card-subtitle mb-2 col-6">Room Numbers</h6>
                        <h6 class="card-subtitle mb-2 col-6">: {{ $data->nomorKamar }}</h6>
                        <h6 class="card-subtitle mb-2 col-6">Check In</h6>
                        <h6 class="card-subtitle mb-2 col-6">: {{ $data->check_in }}</h6>
                        <h6 class="card-subtitle mb-2 col-6">Check Out</h6>
                        <h6 class="card-subtitle mb-2 col-6">: {{ $data->check_out }}</h6>
                        <h6 class="card-subtitle mb-2 col-6">Total Room</h6>
                        <h6 class="card-subtitle mb-2 col-6">: {{ $data->many_room }}</h6>
                        <h6 class="card-subtitle mb-2 col-6">Price/Room</h6>
                        <h6 class="card-subtitle mb-2 col-6">: @currency($data->room->roomType->price)</h6>
                        <hr>
                        <h6 class="card-subtitle mb-2 col-6">Total Price</h6>
                        <h6 class="card-subtitle mb-2 col-6">: @currency($data->payment->price)</h6>
                        <center>
                            <h6 class="card-subtitle mt-4 mb-2 col-12">** Thank You **</h6>
                        </center>
                    </div>
                </div>
                @if(app('router')->getRoutes()->match(app('request')->create(URL::current()))->getName() == 'transaction.proof')
                    <a href="{{ route('transaction.proof.print', $data->id) }}" class="btn btn-primary mt-2 float-right">Download PDF</a>
                @endif
                </div>
            </div>
        </div>
    </div>

    </body>
    </html>
