
@extends('fiber-layout')

@section('content')

<section class="items">
    <div class="scrollHead">
        <div class="head-cont">
            <div class="head"><i class="lni lni-grid-alt"></i>الاقسام الرئيسية<span style="color: red; margin-right: 15px;">•</span><span class="numbers">{{count($folders)}}</span></div>


<div class="breadcrumbs d-flex align-items-center bg-primary p-4 text-dark" >
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
        <ol style="display: flex;">
        @foreach ($tree as $it)
        <li>
        <a class="p-4 text-xl" href="{{ route('home', ['id'=>$it['link']]) }}">{{$it['name']!=""?$it['name']:"الرئيسية"}}</a>
        /  
        </li>  
      @endforeach
        </ol>
    </div>
  </div>
  
        </div>
    </div>
    <div>
        <div class="cont-all">
            <div class="float-slider">

                @foreach ($folders as $folder)

                <a class="section-box float" href="{{$folder['url']}}">
                    <div class="over" title="{{$folder['name']}}">
                        <div><i class="lni lni-link"></i></div>
                    </div>
                    <div class="image-loading" style="display: none;"><svg xmlns="http://www.w3.org/2000/svg" width="150px" height="50px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="23.5" y="45.5" width="10" height="9" fill="#FF5722"><animate attributeName="y" repeatCount="indefinite" dur="0.7407407407407407s" calcMode="spline" keyTimes="0;0.5;1" values="41;45.5;45.5" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.14814814814814814s"></animate><animate attributeName="height" repeatCount="indefinite" dur="0.7407407407407407s" calcMode="spline" keyTimes="0;0.5;1" values="18;9;9" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.14814814814814814s"></animate></rect><rect x="48.5" y="45.5" width="10" height="9" fill="#FF9800"><animate attributeName="y" repeatCount="indefinite" dur="0.7407407407407407s" calcMode="spline" keyTimes="0;0.5;1" values="42.125;45.5;45.5" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.07407407407407407s"></animate><animate attributeName="height" repeatCount="indefinite" dur="0.7407407407407407s" calcMode="spline" keyTimes="0;0.5;1" values="15.75;9;9" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.07407407407407407s"></animate></rect><rect x="73.5" y="45.5" width="10" height="9" fill="#bfb010"><animate attributeName="y" repeatCount="indefinite" dur="0.7407407407407407s" calcMode="spline" keyTimes="0;0.5;1" values="42.125;45.5;45.5" keySplines="0 0.5 0.5 1;0 0.5 0.5 1"></animate><animate attributeName="height" repeatCount="indefinite" dur="0.7407407407407407s" calcMode="spline" keyTimes="0;0.5;1" values="15.75;9;9" keySplines="0 0.5 0.5 1;0 0.5 0.5 1"></animate></rect></svg></div>
                    <img
                         src="{{$folder['img']}}" alt="{{$folder['name']}}" style="visibility: visible;">
                        <div class="title">{{$folder['name']}}</div>
                </a>
                @endforeach


            </div>
        </div>
    </div>
</section>

    
@endsection


