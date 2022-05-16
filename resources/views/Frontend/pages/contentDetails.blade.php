@extends('Frontend.main')
@section('content')
<section class="breadcrumbs">
       
</section>
<div class="container">
    <div class="row">
        <h2 class="mt-3">About {{$contentDetails[0]->title}}</h2><hr>
        <p>{!!$contentDetails[0]->description!!}</p>

        <div class="row">
         
          
                 <div class="col-lg-4 mb-5 col-md-6">
                   @if ($contentDetails[0]->front_img != "")
                        <img class="img-fluid " src="{{url('images/'.$contentDetails[0]->front_img)}}"/> 
                        <p class="text-center" style="font-style: italic">fig: Front view</p>
                  @endif  
                 </div>
                 <div class="col-lg-4 mb-5 col-md-6">
                  @if ($contentDetails[0]->back_img != "")
                        <img class="img-fluid " src="{{url('images/'.$contentDetails[0]->back_img)}}"/>
                        <p class="text-center" style="font-style: italic">fig: Back view</p>

                        @endif
                 </div>
                 <div class="col-lg-4 mb-5 col-md-6">
                  @if ($contentDetails[0]->left_img != "")
                        <img class="img-fluid " src="{{url('images/'.$contentDetails[0]->left_img)}}"/>
                        <p class="text-center" style="font-style: italic">fig: Left view</p>

                        @endif
                </div>
                <div class="col-lg-4 mb-5 col-md-6">
                  @if ($contentDetails[0]->right_img != "")
                        <img class="img-fluid " src="{{url('images/'.$contentDetails[0]->right_img)}}"/> 

                        <p class="text-center" style="font-style: italic">fig: Right view</p>
                    
                        @endif
                   </div>
                 <div class="col-lg-4 mb-5 col-md-6">
                  @if ($contentDetails[0]->top_img != "")
                        <img class="img-fluid " src="{{url('images/'.$contentDetails[0]->top_img)}}"/>
                        <p class="text-center" style="font-style: italic">fig: Top view</p>
                    
                        @endif
                   </div>
                 <div class="col-lg-4 mb-5 col-md-6">
                  @if ($contentDetails[0]->bottom_img != "")
                        <img class="img-fluid " src="{{url('images/'.$contentDetails[0]->bottom_img)}}"/>
                        
                        <p class="text-center" style="font-style: italic">fig: Bottom view</p>
                    
                        @endif
                   </div>
                 <div class="col-lg-4 mb-5 col-md-6">
                  @if ($contentDetails[0]->inner_img != "")
                        <img class="img-fluid " src="{{url('images/'.$contentDetails[0]->inner_img)}}"/> 

                        <p class="text-center" style="font-style: italic">fig: Inner view</p>
                    
                        @endif
                  
          
                 
          
        </div>
    </div>
</div>
@endsection