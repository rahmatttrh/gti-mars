@extends('layouts.stisla.app-main')
@section('title')
    News Detail
@endsection
@section('content')
<article class="article shadow-lg article-style-c">
   <div class="article-header" style="max-height: 380px">
      @if ($feed->image == null)             
         <div class="article-image"  data-background="{{asset('img/offshore/31.jpeg')}}"></div>
      @else
         <div class="article-image"  data-background="{{asset('storage/' .$feed->image)}}"></div>
      @endif
     
   </div>
   <div class="article-details">
     <div class="article-category"><a href="#">News</a> <div class="bullet"></div> <a href="#">5 Days</a></div>
     <div class="article-title">
       <h2><a href="#">{{$feed->title}}</a></h2>
     </div>
     {!! $feed->content !!}
     <div class="article-user">
       <img alt="image" src="{{asset('stisla/img/avatar/avatar-1.png')}}">
       <div class="article-user-details">
         <div class="user-detail-name">
           <a href="#">Merine</a>
         </div>
         <div class="text-job">Media Officer</div>
       </div>
     </div>
   </div>
</article>
@endsection

