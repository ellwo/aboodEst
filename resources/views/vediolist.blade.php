
@extends('fiber-layout')

@section('content')

{{-- <link href="https://vjs.zencdn.net/8.5.2/video-js.css" rel="stylesheet" /> --}}

<div x-data="{vidsrc:'{{ $vedioList[0]['url'] }}'}">


<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

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


@php
    $i=0;
@endphp

<div dir="ltr">
</div>
<div style="display: block; height: 35%;" class="lg:w-2/3 w-full mx-auto h-64">

  <video
  id="my-video"

width="640"
height="264"
poster="{{$vedioList[0]['img']}}"
>
  <source id="src" src="{{ $vedioList[0]['url'] }}" type="video/mp4" />
 
</video>

<button id="downloadButton">Download</button>
 </div>

 
 <div style="overflow-x: scroll; flex-wrap: wrap;" class="flex  overflow-x-scroll space-x-2 mx-auto mb-8 py-4">

@foreach ($vedioList as $ved)

<div class=" space-y-4  mx-2 ">
    <div class="cursor-pointer  rounded-lg text-center m-2"
    :class="{
      'bg-primary':vidsrc=='{{$ved['url']}}',
      'bg-transparent':vidsrc!='{{$ved['url']}}'
    }"
    onclick="changeVideo('{{$ved['url']}}')"
    @click="vidsrc='{{$ved['url']}}'" 
    style="  width: 100%;  ">
    <img style="height: 250px;" src="{{$ved['img']}}" height="30px" alt="" srcset=""/> 

    <span  style="font-size: 28pt;"> {{ $i+1 }}</span>
    </div>
</div>

   @php
       $i++;
   @endphp


@endforeach

</div>
</div>
<script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>

{{-- <script src="https://vjs.zencdn.net/8.5.2/video.min.js"></script> --}}

<script>
  const player = new Plyr('#my-video',{controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'settings', 'download', 'pip', 'airplay', 'fullscreen']});
  
</script>

<script>
  //const v = document.getElementById("my-video");
const s = document.getElementById("src");

function changeVideo(src) { 
   s.src =src; 
   console.log("src:--- "+src);
   player.source = {
    type: 'video',
    title: 'الحلقة {{$i+1}}',
    sources: [
        {
            src: src,
            type: 'video/mp4',
        } 
    ],
};
 //  player.play();
   //'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4';
}

</script>
@endsection
