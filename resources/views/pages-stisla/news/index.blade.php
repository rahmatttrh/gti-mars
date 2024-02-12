@extends('layouts.stisla.app-main')
@section('title')
   News Feed
@endsection

@section('content')
{{-- <div class="card shadow-lg">
   <div class="card-body">
      <div class="row">
         <div class="col-md-5">
            <b>Form Create Article</b>
            <hr>
            <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label for="title">Title</label>
                     <input type="text" class="form-control " id="title" name="title" >
                  </div>
                  <div class="form-group col-md-4">
                     <label for="email">Email</label>
                     <input type="text" class="form-control " id="email" name="email" >
                  </div>
               </div>
               <div class="form-group form-group-default">
                  <label>Content</label>
                  <textarea id="procedure" name="procedure"  type="text" class="form-control" required></textarea>
                  <input id="content" name="content" type="hidden" name="content">
                  <trix-editor input="content"></trix-editor>
               </div> 
               <div class="form-group ">
                  <label for="image">Image</label>
                  <input type="file" class="form-control " id="image" name="image" >
               </div>
               <button type="submit" class="btn btn-info">Publish</button>
            </form>
         </div>
         <div class="col-md-7">
            <div class="table-responsive">
               <table class="table table-sm table-striped" id="table-16">
                  <thead>
                     <tr>
                        <th class="text-center" style="width: 30px">No.</th>
                        
                        <th>Title</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($news as $new)
                         <tr>
                           <td class="text-center">{{++$i}}</td>
                           <td>{{$new->title}}</td>
                           <td>{{formatDate($new->created_at)}}</td>
                           <td>Published</td>
                           <td>edit</td>
                         </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div> --}}
<div class="card shadow-sm border">          
   <div class="card-body">
      <div class="col-md-6"></div>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
         <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Create Article</a>
         </li>
         {{-- <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Newsfeeds</a>
         </li> --}}
      </ul>
      <div class="tab-content" id="myTabContent">
         <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <form action="{{route('news.update')}}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <input type="number" value="{{$feed->id}}" name="feed" id="feed" hidden>
               <div class="form-row">
                        
                  <div class="form-group col-md-12">
                     <label for="title">Title</label>
                     <input type="text" class="form-control " value="{{$feed->title}}" required id="title" name="title" >
                  </div>
                  {{-- <div class="form-group col-md-4">
                     <label for="email">Email</label>
                     <input type="text" class="form-control " id="email" name="email" >
                  </div> --}}
               </div>
               <div class="form-group form-group-default">
                  <label>Content</label>
                  {{-- <textarea id="procedure" name="procedure"  type="text" class="form-control" required></textarea> --}}
                  <input id="content" name="content" value="{{$feed->content}}" type="hidden" >
                  <trix-editor input="content"></trix-editor>
               </div> 
               <div class="row">
                  <div class="col-md-3">
                     @if ($feed->image == null)
                     
                     <img src="{{asset('stisla/img/news/img08.jpg')}}" alt="..." class="img-thumbnail">
                     @else
                     <img src="{{asset('storage/' .$feed->image)}}" alt="..." class="img-thumbnail">
                     @endif
                     
                  </div>
                  <div class="col-md-9">
                     <div class="form-group ">
                        <label for="image">Header Image</label>
                        <input type="file" class="form-control "  id="image" name="image" >
                     </div>
                  </div>
               </div>
               <hr>
               <button type="submit" class="btn btn-info">Publish</button>
            </form>
         
         </div>
         <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row">
               
               <div class="col-12">
                  <div class="table-responsive">
                     <table class="table table-striped table-sm" id="table-1">
                        <thead>
                        <tr>
                           {{-- <th class="text-center">No.</th> --}}
                           <th>Name</th>
                           <th>Region</th>
                           <th>Email</th>
                           <th>Type</th>
                           <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

