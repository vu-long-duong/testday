<x-app-layout>
  <div class="container">
    <p class="text-center"><strong>Sửa bài viết</strong></p>
    
    <form action="{{route('admin.post-update',['id'=>$post->id])}}" method="POST" enctype='multipart/form-data'>
      @csrf
      @foreach($post as $key => $value)
      <div class="form-outline mb-4">
        <label class="form-label" for="form4Example1">Title:</label>
        <input type="text" id="form4Example1" name="title" value="{{$value->title}}" class="form-control"/> 
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="form4Example3">Content:</label>
        <textarea class="form-control" id="form4Example3" name="content" rows="4">{{$value->content}}</textarea>
      </div>


      <label class="form-control-label" for="input-address">Image:</label>
      <br>
      <input type="file" class="form-control-file" id="imagefile" name="image" onchange="chooseFile(this)" value="{{old('image')}}">
      <img src="{{asset('storage/images/'.$value->imagepost )}}" height="200" width="150" >
      </img>

      <div class="form-check  justify-content-center mb-4">
        <input class="form-check-input me-2" type="checkbox" name="status" value="1" id="form4Example4" checked />
        <label class="form-check-label" for="form4Example4">
          Active ?
        </label>
      </div>
      

      <button type="submit" class="btn btn-primary mb-4">
        Save
      </button>

    </form>
    @endforeach
  </div>
</x-app-layout>