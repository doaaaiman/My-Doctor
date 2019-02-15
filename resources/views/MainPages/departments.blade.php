@extends('layouts.app')
@section('title','Departments')
@section('content')

<!-- Banner Area Starts -->
    <section class="banner-area other-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Departments</h1>
                    <a href="/">Home</a> <span>|</span> <a href="/MyDoctor/departments">Departments</a>
                </div>
            </div>
        </div>
    </section>

<section class="department-area section-padding4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-top text-center">
                        <h2>Popular department</h2>
                        <p>Green above he cattle god saw day multiply under fill in the cattle fowl a all, living, tree word link available in the service for subdue fruit.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="department-slider owl-carousel">
                        @foreach($specialties as $specialty)
                        <div class="single-slide">
                            <div class="slide-img">
                                <img src="{{asset('storage/images/'.$specialty->photo)}}" alt="" class="img-fluid">
                                <div class="hover-state">
                                    <a href="#"><i class="fa fa-stethoscope"></i></a>
                                </div>
                            </div>
                            <div class="single-department item-padding text-center">
                                <h3>{{$specialty->name}}</h3>
                                <p>Hath creeping subdue he fish gred face whose spirit that seasons today multiply female midst upon</p>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

