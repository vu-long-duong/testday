<x-app-layout>
  <div class="container">
    <p class="text-center"><strong>Thêm bài viết</strong></p>

    <form action="{{route('admin.post-store')}}" method="POST" enctype='multipart/form-data'>
      @csrf
      <div class="form-outline mb-4">
        <label class="form-label" for="form4Example1">Title:</label>
        <input type="text" id="form4Example1" name="title" class="form-control" />

      </div>


      <div class="form-outline mb-4">
        <label class="form-label" for="form4Example3">Content:</label>
        <textarea class="form-control" id="form4Example3" name="content" rows="4"></textarea>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script>
        function chooseFile(fileInput) {
          if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#image').attr('src', e.target.result)
            }
            reader.readAsDataURL(fileInput.files[0]);
          }
        }
      </script>

      <label class="form-control-label" for="input-address">Image:</label>
      <br>
      <input type="file" class="form-control-file" id="imagefile" name="image" onchange="chooseFile(this)" value="{{old('image')}}">
      <img src="" id="image" height="200" width="150" accept="imagge/jpg, imagge/gif, image/jpeg, image/png">
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
  </div>
</x-app-layout>