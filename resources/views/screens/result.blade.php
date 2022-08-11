@extends('screens.index')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Fetched data View </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Image</th>
                         
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gears as $gear)
                            <tr>
                                <td>{{ $gear->id }}</td>
                                <td>{{ $gear->item }}</td>
                                <td>{{ $gear->price }}</td>
                                <td> <img src="{{ Storage::url($gear->image) }}" height="75" width="75" alt="" /></td>
                                <td><form action="{{route('gears.destroy',$gear->id)}}" method="POST">
                                    <a class="btn btn-primary" href="{{route('gears.edit',$gear->id) }}">Update</a>
                                    @csrf
                                    @method('DELETE')
                                   <button class="btn btn-outline-danger" type="submit">Delete</button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection