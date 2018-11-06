@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h3>Repairs</h3>
      </div>
      <div class="col-sm-4">
        <a class="btn btn-sm btn-success" href="{{ route('repair.create') }}">Create New Repair</a>
        <a class="btn btn-sm btn-success" href="{{ route('customer.index') }}">Customers</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <h1> Device Information</h1>
    <table class="table table-hover table-sm">
      <tr>
        <th width = "50px"><b>No.</b></th>
        <th >Brand</th>
        <th>Model</th>
        <th>IMEI</th>
        <th>Type</th>
        <th>Description</th>
        <th>Status</th>
        <th>Customer</th>
        <th width = "180px">Action</th>
      </tr>

      @foreach ($repairs as $repair)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$repair->brand}}</td>
          <td>{{$repair->model}}</td>
          <td>{{$repair->imei}}</td>
          <td>{{$repair->type}}</td>
          <td>{{$repair->discription}}</td>
          <td>
          @if($repair->status === 1 )
          <div class="alert alert-success" role="alert">
            Done
          </div>
          @else
          <div class="alert alert-danger" role="alert">
            Pending
          </div>
          @endif
          </td>
          <td>{{$repair->customer->fname}} {{$repair->customer->lname}}</td>

          <td>
            <form action="{{ route('repair.destroy', $repair->id) }}" method="post">
              <a class="btn btn-sm btn-success" href="{{route('repair.show',$repair->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('repair.edit',$repair->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $repairs->links() !!}
  </div>
@endsection
