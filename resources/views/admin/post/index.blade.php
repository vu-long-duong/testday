<x-app-layout>
<div class="container">
<form action="{{route('admin.post-index')}}" method="get">

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">image</th>
      <th scope="col">Status</th>
      <th scope="col">Control</th>
    </tr>
  </thead>
  @foreach($post as $key =>$value)
  <tbody>
    <tr>
    <th scope="row">{{$value->id}}</th>
      <td>{{$value->title}}</td>
      <td>{{$value->content}}</td>
      <td><img src="{{asset('storage/images/'.$value->imagepost )}}" height="200" width="100"> </td>
      <td>{{$value->status}}</td>
      <td>
      <button class= "btn btn-warning mb-4"> <a href="{{route('admin.post-edit',['id'=>$value->id])}}"> Sửa </a></button>
      <button class= "btn btn-danger"> Xóa </button>
      </td>
    </tr>
  </tbody>
  @endforeach
</table>

</form>
</div>
</x-app-layout>