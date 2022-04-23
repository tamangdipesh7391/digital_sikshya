@extends('Backend.main')
@section('content')
<div class="container">
    <h2>Details of     {{$singlesubcontentData->getSubjectName->title}} subject(Grade : {{$singlesubcontentData->getGradeName->title}} <b>- {{$singlesubcontentData->getLevelName->title}}</b> )
    </h2>
  

<hr>
<div class="col-md-8">
    <form action="{{route('edit-subjectcontent',$singlesubcontentData->id)}}" method="POST" class="form-group" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Heading </label>
            <input readonly type="text" class="form-control" value="{{$singlesubcontentData->heading}}" name="heading" >  
            <a style="color: red">
            @error('heading')
                {{$message}}
            @enderror
            </a>
          </div>
          <div class="form-group">
            <label for="">Title</label>
            <input readonly type="text" class="form-control" value="{{$singlesubcontentData->title}}" name="title" >  
            <a style="color: red">
            @error('title')
                {{$message}}
            @enderror
            </a>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
                <label for="">Thumbnail</label>
                <img class="img-fluid prev_img mt-2 " id="thumbnail" src="{{url('images/'.$singlesubcontentData->thumbnail)}}" alt="your image" />
              </div>
              <div class="form-group col-md-6">
                <label for="">Inner</label>
                <img class="img-fluid prev_img mt-2" id="inner_img" src="{{url('images/'.$singlesubcontentData->inner_img)}}" alt="your image" />

              </div>
          </div>
         <div class="row">
            <div class="form-group col-md-6">
                <label for="">Front</label>
                <img class="img-fluid prev_img mt-2" id="front_img" src="{{url('images/'.$singlesubcontentData->front_img)}}" alt="your image" />

                 {{-- <a style="color: red">@error('thumbnail') {{$message}} @enderror </a> --}}
              </div>
              <div class="form-group col-md-6">
                <label for="">Back</label>
                <img class="img-fluid prev_img mt-2" id="back_img" src="{{url('images/'.$singlesubcontentData->back_img)}}" alt="your image" />

                 {{-- <a style="color: red">@error('thumbnail') {{$message}} @enderror </a> --}}
              </div>
         </div>
          <div class="row">
            <div class="form-group col-md-6">
                <label for="">Left</label>
                <img class="img-fluid prev_img mt-2" id="left_img" src="{{url('images/'.$singlesubcontentData->left_img)}}" alt="your image" />

                 {{-- <a style="color: red">@error('thumbnail') {{$message}} @enderror </a> --}}
              </div>
              <div class="form-group col-md-6">
                <label for="">Right</label>
                <img class="img-fluid prev_img mt-2" id="right_img" src="{{url('images/'.$singlesubcontentData->right_img)}}" alt="your image" />

                 {{-- <a style="color: red">@error('thumbnail') {{$message}} @enderror </a> --}}
              </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
                <label for="">Top</label>
                <img class="img-fluid prev_img mt-2" id="top_img" src="{{url('images/'.$singlesubcontentData->top_img)}}" alt="your image" />

                 {{-- <a style="color: red">@error('thumbnail') {{$message}} @enderror </a> --}}
              </div>
              <div class="form-group col-md-6">
                <label for="">Bottom</label>
                <img class="img-fluid prev_img mt-2" id="bottom_img" src="{{url('images/'.$singlesubcontentData->bottom_img)}}" alt="your image" />

                 {{-- <a style="color: red">@error('thumbnail') {{$message}} @enderror </a> --}}
              </div>
          </div>
          
          <div class="form-group">
            <label for="">Meta Description</label>
            {!!$singlesubcontentData->meta_description!!}
          </div>
          <div class="form-group">
            <label for="">Description</label>
            {!!$singlesubcontentData->description!!}

          </div>

        <?php
         $sid = $singlesubcontentData->subject;
            $gid = $singlesubcontentData->grade;
            $lid = $singlesubcontentData->level;
            
        ?>

          <div class="form-group">
              <a href="{{url('admin-panel/show-subjectcontent/'.$sid.'/'.$gid.'/'.$lid)}}" class="btn btn-info">Go Back</a>
          </div>
    </form>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
    var thumbnail = "{{$singlesubcontentData->thumbnail}}";
    if(thumbnail == ""){
        $('#thumbnail').hide();
    }
    var inner_img = "{{$singlesubcontentData->inner_img}}";
    if(inner_img == ""){
        $('#inner_img').hide();
    }
    var front_img = "{{$singlesubcontentData->front_img}}";
    if(front_img == ""){
        $('#front_img').hide();
    }
    var back_img = "{{$singlesubcontentData->back_img}}";
    if(back_img == ""){
        $('#back_img').hide();
    }
    var left_img = "{{$singlesubcontentData->left_img}}";
    if(left_img == ""){
        $('#left_img').hide();
    }
    var right_img = "{{$singlesubcontentData->right_img}}";
    if(right_img == ""){
        $('#right_img').hide();
    }
    var top_img = "{{$singlesubcontentData->top_img}}";
    if(top_img == ""){
        $('#top_img').hide();
    }
    var bottom_img = "{{$singlesubcontentData->bottom_img}}";
    if(bottom_img == ""){
        $('#bottom_img').hide();
    }


    })
    function previewImg(input,id) {
      if (input.files && input.files[0]) {
        // document.querySelectorAll('.prev_img').style.display="block";
        $(document).ready(function(){
          $(id).show();
        })
          var reader = new FileReader();

          reader.onload = function (e) {
              $(id).attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }

  
 
</script>

@endsection