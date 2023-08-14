@extends('layouts.template')
@section('content')
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('images/kamar/' . $data->foto)}}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            Detail Kamar
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2">{{'Tipe Kamar : ' . ' ' . $data->name}}</h6>
                            <h6 class="card-subtitle mb-2">{{'Fasilitas Kamar : ' . ' ' . $data->facilities}}</h6>
                            <h6 class="card-subtitle mb-2">{{'Kapasitas Kasur : ' . '2' }}</h6>
                            <h6 class="card-subtitle mb-2">{{'Harga Permalam : '}}@currency($data->price)</h6>
                            <h6 class="card-subtitle mb-2">{{'Kamar Tersedia : ' . ' ' . $jumlahTersedia}}</h6>
                            <h6 class="card-subtitle mb-2">{{'Keterangan Tipe Kamar : ' . ' ' }} <br>
                                <p class="ml-3">{{ $data->information }}</p></h6>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            Form Booking
                        </div>
                        <div class="card-body">
                            @auth
                            @if ($jumlahTersedia == 0)
                                <div class="form-group">
                                    <label for="jumlah">Jumlah Pesanan</label>
                                    <input type="text" class="form-control" disabled value="Full Book">
                                </div>
                            @else
                                <form action="{{ route('customer.book.now') }}" method="post">
                                    @csrf
                                        <input type="hidden" name="type_id" value="{{ $data->id }}">
                                        <input type="hidden" name="stok" value="{{ $jumlahTersedia }}">

                                        <div class="form-group">
                                            <label for="jumlah">Jumlah Pesanan</label>
                                            <input type="number" class="form-control" {{ $jumlahTersedia == 0 ? 'disabled' : ''  }} value="{{ $jumlahTersedia == 0 ? '0' : '1'  }}" min="1" max="{{ $jumlahTersedia }}" required name="jumlah" id="jumlah">
                                        </div>
                                        <div class="form-group">
                                            <label for="check_in">Check In</label>
                                            <input type="date" min='<?= date('Y-m-d'); ?>' class="form-control" value="{{old('check_in')}}" onchange="checkout()" required name="check_in" id="check_in">
                                        </div>
                                        <div class="form-group">
                                            <label for="check_out">Check Out</label>
                                            <input type="date" disabled min='<?= date('Y-m-d', strtotime('+1 day')); ?>' class="form-control" value="{{old('check_out')}}" required name="check_out" id="check_out">
                                        </div>

                                        <div class="mt-2">

                                            <button type="submit" class="btn btn-success float-right">Book Now</button>

                                        </div>
                                    @endif
                                </form>
                            @else
                            <center>

                                <a href="{{ route('login') }}" class="btn btn-warning">Login First</a>
                            </center>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    function checkout(){
        var checkin = new Date($('#check_in').val());
        var dd = checkin.getDate()+1;
        var mm = checkin.getMonth()+1; //January is 0 so need to add 1 to make it 1!
        var yyyy = checkin.getFullYear();
        var lastDayOfMonth = new Date(yyyy, mm, 0);
        if(dd<10){
            dd='0'+dd
        }
        if(dd > lastDayOfMonth.getDate()){
            dd='01'
            mm+=1
        }
        if(mm<10){
            mm='0'+mm
        }

        today = yyyy+'-'+mm+'-'+dd;
        console.log(today);
        document.getElementById("check_out").setAttribute("min", today);
        document.getElementById("check_out").removeAttribute("disabled");
    }
</script>
@endsection
