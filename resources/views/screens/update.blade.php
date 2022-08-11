@extends('screens.index')
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger mt-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
Update your Data
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="staticBackdropLabel">Update CRUD Gear</h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form action="{{route('gears.update',$gear->id) }}" method="POST"  enctype="multipart/form-data">
  @csrf
  @method('PUT')
<div class="my-3">
<input type="text" class="form-control"  placeholder="Item Name" name="item"  value="{{$gear->item}}">   
</div>
<div class="my-3">
<input type="text" class="form-control"  placeholder="Item Price" name="price"  value="{{$gear->price}}">  
</div>
<div class="my-3">
<input type="file" class="form-control"  name="image"  value="{{$gear->image}}" required>  
</div>  
<button type="submit" class="btn btn-outline-danger">Add Record</button>
</form>
<div class="modal-footer">
  <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>    

@endsection