<div class="form-group">
    <label for="">Subject  </label>
    <select multiple name="subject[]" class="form-control select-multiple" id="">
        @foreach ($subjects as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
        @endforeach
        </select>           
    <a style="color: red">
    @error('subject')
        {{$message}}
    @enderror
    </a>
  </div>

  <script>
      $(document).ready(function() {
    $('.select-multiple').select2();
});
  </script>