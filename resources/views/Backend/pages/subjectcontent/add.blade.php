@extends('Backend.main')
@section('content')
<div class="container">
    <h2>Add Subject Content Here</h2>
    @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
            @endif

<hr>
<div class="col-md-8">
    <form action="" method="POST" class="form-group" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Heading </label>
            <input type="text" class="form-control" value="{{old('heading')}}" name="heading" placeholder="A,B,C,..etc">  
            <a style="color: red">
            @error('heading')
                {{$message}}
            @enderror
            </a>
          </div>
          <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control" value="{{old('title')}}" name="title" placeholder="Apple,Ball,Car,.. etc.">  
            <a style="color: red">
            @error('title')
                {{$message}}
            @enderror
            </a>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
                <label for="">Thumbnail</label>
                <input type="file" class="form-control" name="thumbnail" onchange="previewImg(this,'#thumbnail');"   />  
                <img class="img-fluid prev_img mt-2 " id="thumbnail" src="#" alt="your image" />
                 <a style="color: red">@error('thumbnail') {{$message}} @enderror </a>
              </div>
              <div class="form-group col-md-6">
                <label for="">Inner</label>
                <input type="file" class="form-control"  name="inner_img" onchange="previewImg(this,'#inner_img');">  
                <img class="img-fluid prev_img mt-2" id="inner_img" src="#" alt="your image" />

                 {{-- <a style="color: red">@error('thumbnail') {{$message}} @enderror </a> --}}
              </div>
          </div>
         <div class="row">
            <div class="form-group col-md-6">
                <label for="">Front</label>
                <input type="file" class="form-control"  name="front_img" onchange="previewImg(this,'#front_img');" >  
                <img class="img-fluid prev_img mt-2" id="front_img" src="#" alt="your image" />

                 {{-- <a style="color: red">@error('thumbnail') {{$message}} @enderror </a> --}}
              </div>
              <div class="form-group col-md-6">
                <label for="">Back</label>
                <input type="file" class="form-control"  name="back_img" onchange="previewImg(this,'#back_img');" >  
                <img class="img-fluid prev_img mt-2" id="back_img" src="#" alt="your image" />

                 {{-- <a style="color: red">@error('thumbnail') {{$message}} @enderror </a> --}}
              </div>
         </div>
          <div class="row">
            <div class="form-group col-md-6">
                <label for="">Left</label>
                <input type="file" class="form-control"  name="left_img" onchange="previewImg(this,'#left_img');" >  
                <img class="img-fluid prev_img mt-2" id="left_img" src="#" alt="your image" />

                 {{-- <a style="color: red">@error('thumbnail') {{$message}} @enderror </a> --}}
              </div>
              <div class="form-group col-md-6">
                <label for="">Right</label>
                <input type="file" class="form-control"  name="right_img" onchange="previewImg(this,'#right_img');" >  
                <img class="img-fluid prev_img mt-2" id="right_img" src="#" alt="your image" />

                 {{-- <a style="color: red">@error('thumbnail') {{$message}} @enderror </a> --}}
              </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
                <label for="">Top</label>
                <input type="file" class="form-control"  name="top_img" onchange="previewImg(this,'#top_img');" >  
                <img class="img-fluid prev_img mt-2" id="top_img" src="#" alt="your image" />

                 {{-- <a style="color: red">@error('thumbnail') {{$message}} @enderror </a> --}}
              </div>
              <div class="form-group col-md-6">
                <label for="">Bottom</label>
                <input type="file" class="form-control"  name="bottom_img" onchange="previewImg(this,'#bottom_img');" >  
                <img class="img-fluid prev_img mt-2" id="bottom_img" src="#" alt="your image" />

                 {{-- <a style="color: red">@error('thumbnail') {{$message}} @enderror </a> --}}
              </div>
          </div>
          
          <div class="form-group">
            <label for="">Meta Description</label>
            <textarea name="meta_description" id="ck_meta_description" cols="30" rows="10">{{old('meta_description')}}</textarea>
            <a style="color: red">@error('meta_description') {{$message}} @enderror </a>
          </div>
          <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" id="ck_description" cols="30" rows="10">{{old('description')}}</textarea>
            <a style="color: red">@error('description') {{$message}} @enderror </a>
          </div>

        

          <div class="form-group">
              <button class="btn btn-info">Add</button>
          </div>
    </form>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
      $('#thumbnail').hide();
      $('#inner_img').hide();
      $('#front_img').hide();
      $('#back_img').hide();
      $('#left_img').hide();
      $('#right_img').hide();
      $('#top_img').hide();
      $('#bottom_img').hide();

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