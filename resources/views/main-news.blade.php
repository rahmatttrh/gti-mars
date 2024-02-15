@extends('layouts.stisla.app-main')
@section('title')
   Home Page
@endsection

@section('content')
   <section class="section">
      <div class="section-body">
         <div class="row">
            <div class="col-md-8">
               <div class="row">
                  <div class="col-md-12">
                     <article class="article shadow-lg article-style-c">
                        <div class="article-header" style="max-height: 170px">
                           @if ($feed->image == null)             
                                 <div class="article-image"  data-background="{{asset('img/offshore/31.jpeg')}}"></div>
                              @else
                                 <div class="article-image"  data-background="{{asset('storage/' .$feed->image)}}"></div>
                           @endif
                        </div>
                        <div class="article-details">
                          
                           <div class="article-category"><a href="#">News</a> <div class="bullet"></div> <a href="#">{{$feed->updated_at->diffForHumans()}}</a></div>
                           <div class="article-title">
                              <h2><a href="{{route('news.detail', enkripRambo($feed->id))}}">{{$feed->title}}</a></h2>
                           </div>
                           {{-- <p class="text-truncate">{!! $feed->content !!} </p> --}}
                           <div class="article-user align-items-center">
                              <img alt="image" src="{{asset('stisla/img/avatar/avatar-1.png')}}">
                              <div class="article-user-details">
                                 <div class="user-detail-name">
                                 <a href="#">Marine</a>
                                 </div>
                                 <div class="text-job">Media Officer</div>
                              </div>
                           </div>
                        </div>
                     </article>
                    
                  </div>
               </div>
               <div class="card shadow-lg">
                  <div class="card-header">
                     <h4>MARS (Marine Advanced Reporting System)</h4>
                  </div>
                  <div class="card-body">
                        <p>The purpose of the MARS is to assess and improve Marine assurance, technical and operational to the managing safe work procedures to assure marine work activities are completed without incident and poor reliability. These activities include Digital Smart Port, Vessel Daily Report, Preventive maintenance System, Contractor Safety Management System, Service performance Report, Leadership Engagement, Leadership Safeguard Verification, General Inspection. , Fuel Monitoring System. The Marine Operation Team conduct field engagements and written assessments to evaluate knowledge and conformance to safe work procedures. During the field engagement, the team uses a protocol specific to the safe work procedure being observed that is aligned with IMO and industry standards, regulations, and managing safe work procedures. Results of the assessments are shared immediately with the employee or contractor. If an assessment identifies significant opportunities for improvement, the Marine Operation Team will conduct a follow up observation with the employee of contractor to validate the coaching was effective. On a routine basis, the data from the assessments is gathered and analyzed to identify systemic gaps and remedial actions for improvement. </p>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <marquee  class="px-4 bgb-2 shadow-lg rounded text-white py-2 px-2 mb-2" >
                  <i class="fa fa-bell"></i> Welcome to MARS, This app contains several systems (Digital Smart Port, Vessel Daily Report, PROACT and MAP)  
               </marquee>
               
               <div class="card shadow-lg">
                  <div class="card-body p-0">
                     <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="4"></li>
                        </ol>
                        <div class="carousel-inner">
                           <div class="carousel-item active" style="max-height: 250px">
                              <img class="d-block w-100"  src="{{asset('img/offshore/12.jpg')}}" alt="First slide">
                              
                           </div>
                           <div class="carousel-item" style="max-height: 250px">
                              <img class="d-block w-100"  src="{{asset('img/offshore/9.jpg')}}" alt="Second slide">
                              
                           </div>
                           <div class="carousel-item" style="max-height: 250px">
                              <img class="d-block w-100"  src="{{asset('img/offshore/10.jpg')}}" alt="Third slide">
                              
                           </div>
                           <div class="carousel-item" style="max-height: 250px">
                              <img class="d-block w-100"  src="{{asset('img/offshore/13.jpg')}}" alt="Third slide">
                           
                           </div>
                           <div class="carousel-item" style="max-height: 250px">
                              <img class="d-block w-100"  src="{{asset('img/offshore/16.jpg')}}" alt="Third slide">
                           
                           </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                     </div>
                  </div>
                  <div class="card-footer">
                     <div class="gallery">
                        <div class="gallery-item" data-image="{{asset('img/offshore/12.jpg')}}" data-title="Image 1"></div>
                        <div class="gallery-item" data-image="{{asset('img/offshore/9.jpg')}}" data-title="Image 2"></div>
                        <div class="gallery-item" data-image="{{asset('img/offshore/10.jpg')}}" data-title="Image 3"></div>
                        <div class="gallery-item" data-image="{{asset('img/offshore/13.jpg')}}" data-title="Image 4"></div>
                        <div class="gallery-item" data-image="{{asset('img/offshore/16.jpg')}}" data-title="Image 5"></div>
                        <div class="gallery-item" data-image="{{asset('img/offshore/5.jpg')}}" data-title="Image 6"></div>
                        <div class="gallery-item" data-image="{{asset('img/offshore/6.jpg')}}" data-title="Image 7"></div>
                        <div class="gallery-item" data-image="{{asset('img/offshore/parakan.jpeg')}}" data-title="Image 8"></div>
                        <div class="gallery-item gallery-more" data-image="{{asset('img/offshore/7.jpg')}}" data-title="Image 9">
                        <div>+6</div>
                        </div>
                        <div class="gallery-item gallery-hide" data-image="{{asset('img/offshore/8.jpg')}}" data-title="Image 10"></div>
                        <div class="gallery-item gallery-hide" data-image="{{asset('img/offshore/1.jpeg')}}" data-title="Image 11"></div>
                        <div class="gallery-item gallery-hide" data-image="{{asset('img/offshore/3.jpeg')}}" data-title="Image 12"></div>
                        <div class="gallery-item gallery-hide" data-image="{{asset('img/offshore/11.jpg')}}" data-title="Image 13"></div>
                        <div class="gallery-item gallery-hide" data-image="{{asset('img/offshore/4.jpeg')}}" data-title="Image 14"></div>
                        <div class="gallery-item gallery-hide" data-image="{{asset('img/offshore/2.jpeg')}}" data-title="Image 10"></div>
                     </div>
                  </div>
                  <div class="card-footer bg-whitesmoke">
                     Image Gallery of PHE OSES
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   
@endsection



