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
                @foreach($posts as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="single-news">
                        <div class="news-img">
                            <img src="{{asset('storage/images/'.$post->photo)}}" alt="" class="img-fluid">
                        </div>
                        <div class="news-text">
                            <div class="news-date">
                            {{date('d-m-Y', strtotime($post->updated_at))}}
                                
                            </div>
                            <h3><a href="blog-details.html">{{$post->title}}</a></h3>
                            <p>{{$post->summary}}</p>
                            <a href="/post/{{$post->id}}" class="news-btn">read more <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
           
        </div>
    </section>
    
@endsection

