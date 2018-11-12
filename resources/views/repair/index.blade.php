@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h3>Repairs</h3>
      </div>
      <div class="col-md-4">
        <a class="btn btn-sm btn-success" href="{{ route('repair.create') }}">Create New Repair</a>

        <a class="btn btn-sm btn-success" href="{{ route('customer.index') }}">Customers</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <div class="row-item">
      <div class="col-md-8">
       <h1> Device Information</h1>
      </div>
      <div class="col-md-4">
       
      </div>
    </div>
    

    <table class="table table-hover table-md">
      <tr>
        <th width = "50px"><b>No.</b></th>
        <th >Brand Model</th>
        <th>Price</th>
        <th>IMEI</th>
        <th>Type</th>
        <th>Description</th>
        <th>Status</th>
        <th>Customer</th>
        <th width = "180px">Action</th>s
      </tr>

      @foreach ($repairs as $repair)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$repair->brand}} {{$repair->model}}</td>
          <td>{{$repair->price}}</td>
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
              <a class="btn btn-sm btn-success" href="{{route('repair.show',$repair->id)}}">Show</a>
              <button type="submit" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal">Update</button>
                            <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="Done" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{$repair->customer->fname}} {{$repair->customer->lname}}</h4><br>
                        <h6>{{$repair->customer->address}}</h6>
                        <h6>{{$repair->customer->phone}}</h6>
                      </div>
                      <form action="{{route('repair.update',$repair->id)}}" method="post">
                        @csrf
                        @method('PUT')
                          <div class="modal-body">
                            <p>{{ $repair->brand }} {{ $repair->model }}</p>
                            <p></p>
                            <p><strong>Date:</strong> {{ $repair->created_at }}</p>
                            <p><strong>Type:</strong> {{ $repair->type }}</p>
                            <p><strong>Discription:</strong> {{ $repair->discription }}</p>
                            <p><strong>Price:</strong> £{{ $repair->price }}</p>
                          </div>
                          <div class="modal-footer">
                            @if($repair->status == 0 )
                            <button type="submit" class="btn btn-success">Repaired</button>
                            @else
                            <button type="submit" class="btn btn-info">Not Repaired?</button>
                            @endif
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                          </div>
                      </form>
                    </div>

                  </div>
                </div>
          </td>
        </tr>
      @endforeach
    </table>

{!!$repairs->links() !!}
  </div>
@endsection
