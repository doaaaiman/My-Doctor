@extends('layouts.app')
@section('title',$title)
@section('content')


    <div class="container mt-5">
        <div class="bd-example mt-1">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php $index = 0; ?>
                    @foreach($sliders as $slider)
                    <li data-target="#carouselExampleCaptions" data-slide-to="{{$index}}" class="{{$index++==0?'active':''}}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    <?php $index = 0; ?>
                    @foreach($sliders as $slider)
                    <div class="carousel-item {{$index++==0?'active':''}}">
                        <img src="{{asset('storage/images/'.$slider->image)}}" class="d-block w-100" alt="{{$slider->title}}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{$slider->title}}</h5>
                            <p>{{$slider->subtitle}}.</p>
                            @if($slider->url)
                            <a href="{{$slider->url}}" class="template-btn mt-3">READE MORE</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->


    
    <!-- Feature Area Starts -->
    <section class="feature-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-feature text-center item-padding">
                        <img src="/medino/assets/images/feature1.png" alt="">
                        <h3>advance technology</h3>
                        <p class="pt-3">Creeping for female light years that lesser can't evening heaven isn't bearing tree appear</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-feature text-center item-padding mt-4 mt-md-0">
                        <img src="/medino/assets/images/feature2.png" alt="">
                        <h3>comfortable place</h3>
                        <p class="pt-3">Creeping for female light years that lesser can't evening heaven isn't bearing tree appear</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-feature text-center item-padding mt-4 mt-lg-0">
                        <img src="/medino/assets/images/feature3.png" alt="">
                        <h3>quality equipment</h3>
                        <p class="pt-3">Creeping for female light years that lesser can't evening heaven isn't bearing tree appear</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-feature text-center item-padding mt-4 mt-lg-0">
                        <img src="/medino/assets/images/feature4.png" alt="">
                        <h3>friendly staff</h3>
                        <p class="pt-3">Creeping for female light years that lesser can't evening heaven isn't bearing tree appear</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Area Starts -->
    <section class="news-area mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-top text-center">
                        <h2>Recent medical news</h2>
                        <p>Green above he cattle god saw day multiply under fill in the cattle fowl a all, living, tree word link available in the service for subdue fruit.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($posts as $article)
                <div class="col-lg-4 col-md-6">
                    <div class="single-news">
                        <div class="news-img">
                            <img src="{{asset('storage/images/'.$article->photo)}}" alt="" class="img-fluid">
                        </div>
                        <div class="news-text">
                            <div class="news-date">
                            {{date('d-m-Y', strtotime($article->updated_at))}}
                                
                            </div>
                            <h3><a href="blog-details.html">{{$article->title}}</a></h3>
                            <p>{{$article->summary}}</p>
                            <a href="/post/{{$article->id}}" class="news-btn">read more <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- News Area Starts -->
