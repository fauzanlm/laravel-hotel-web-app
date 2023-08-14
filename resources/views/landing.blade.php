@extends('layouts.template')
@section('content')
        <!--================Banner Area =================-->
        <section class="banner_area" id="home">
            <div class="booking_table d_flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h6>Away from monotonous life</h6>
						<h2>Hotel Hebat</h2>
						<p>Hotel bersih, aman, nyaman, sehat<br> Harga yang terjangkau anda dapat menginap disini</p>
						<a href="#types" class="btn theme_btn button_hover">Get Started</a>
					</div>
				</div>
            </div>
            <div class="hotel_booking_area position">
                <div class="container">
                    <div class="hotel_booking_table">
                        <div class="col-md-12">
                            <center>

                                <h2>Enjoy Your<br> Holiday With Us</h2>
                            </center>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--================Banner Area =================-->

        <!--================ Accomodation Area  =================-->
        <section class="accomodation_area section_gap" id="types">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Hotel Types</h2>
                </div>
                <div class="row mb_30">
                    @foreach ($roomTypes as $item)
                        <div class="col-lg-4 col-sm-6">
                            <div class="accomodation_item text-center">
                                <div class="hotel_img">
                                    <a href="{{ route('detail.room', $item->id) }}">
                                        <img src="{{ asset('images/tipekamar/'.$item->foto) }}" width="250px" alt="">
                                    </a>
                                    <a href="{{ route('detail.room', $item->id) }}" class="btn theme_btn button_hover">Book Now</a>
                                </div>
                                <a href="{{ route('detail.room', $item->id) }}"><h4 class="sec_h4">{{ $item->name }}</h4></a>
                                <a href="{{ route('detail.room', $item->id) }}">
                                    <h5>@currency($item->price)<small>/night</small></h5>
                                </a>
                                <p>Kamar Tersedia : {{ $item->getTotalRooms->count() }}</p>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--================ Accomodation Area  =================-->


    <!--================ Facilities Area  =================-->
    <section class="facilities_area section_gap" id="facilities">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
            </div>
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_w">Hotel Facilities</h2>
                    <p>Who are in extremely love with eco friendly system.</p>
                </div>
                <div class="row mb_30">
                    @foreach ($hotelFacilities as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-star-empty"></i>{{ $item->facility_name }}</h4>
                            <p>{{ $item->detail }}</p>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </section>
        <!--================ Facilities Area  =================-->

        <!--================ About History Area  =================-->
        <section class="about_history_area section_gap" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d_flex align-items-center">
                        <div class="about_content ">
                            <h2 class="title title_color">About Us</h2>
                            <p>Modern accommodations, topped off with an infusion of rustic charm and a residential feel. Combining comfort and functionality, simple’s design concept uses warm, rich colors to offer comfort in every room.  Accents of warm autumnal fabrics and soft orange hues promote relaxation like spiced pumpkin, tangerine and amber, while modern grays create an understated cool elegance.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid" src="{{ asset('template/image/about_bg.jpg') }}" alt="img">
                    </div>
                </div>
            </div>
        </section>
        <!--================ About History Area  =================-->



@endsection
