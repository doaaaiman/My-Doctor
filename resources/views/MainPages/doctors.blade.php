@extends('layouts.app')
@section('title','Doctors')
@section('content')
<!-- Banner Area Starts -->
    <section class="banner-area other-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Our doctors</h1>
                    <a href="/">Home</a> <span>|</span> <a href="/MyDoctor/doctors">Doctors</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->
    
      <!-- Specialist Area Starts -->
    <section class="specialist-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-top text-center">
                        <h2>Our specialish</h2>
                        <p>Green above he cattle god saw day multiply under fill in the cattle fowl a all, living, tree word link available in the service for subdue fruit.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($users as $user)
                @foreach($doctors as $doctor)
                @if($user->type_id==$doctor->id)
                <div class="col-lg-3 col-sm-6">
                    <div class="single-doctor mb-4 mb-lg-0">
                        <div class="doctor-img">
                            <img src="{{asset('storage/images/'.$doctor->photo)}}" alt="" class="img-fluid">
                        </div>
                        <div class="content-area">
                            <div class="doctor-name text-center">
                                <h3>{{$user->type}}</h3>
                                <h6>{{$user->name}}</h6>
                            </div>
                            <div class="doctor-text text-center">
                                <p>If you are looking at blank cassettes on the web, you may be very confused at the.</p>
                                <ul class="doctor-icon">
                                    <li><a href="#"><i class="fa fa-facebook"></i><a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i><a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i><a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i><a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @endforeach
               
            </div>
        </div>
    </section>
    
@endsection

