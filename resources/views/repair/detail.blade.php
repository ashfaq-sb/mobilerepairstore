@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Repair Details</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="col-md-12">
          <div class="form-group">
            <strong>Customer : </strong> {{ $repair->customer->fname }}  {{ $repair->customer->lname }} <br><strong>Phone :</strong> {{$repair->customer->phone}}
          </div>
        </div>


        <div class="col-md-12">
          <div class="form-group">
            <strong>Device : </strong> {{ $repair->brand }} {{ $repair->model }}
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <strong>Status : </strong>
            @if($repair->status === 1 )
            <span>
              <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Done</button>
               <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="Done" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{ $repair->customer->fname }}  {{ $repair->customer->lname }}</h4>
                        <h6> {{ $repair->customer->address }}</h6>
                        <h6> {{ $repair->customer->phone }}</h6>
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
                            <p><strong>Price:</strong> {{ $repair->price }}</p>
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
            </span>
            @else
            <span>
              <button class="btn-danger" data-toggle="modal" data-target="#myModal">Pending</button>
              <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="Done" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{ $repair->customer->fname }}  {{ $repair->customer->lname }}</h4>
                        <h6> {{ $repair->customer->address }}</h6>
                        <h6> {{ $repair->customer->phone }}</h6>
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
                            <p><strong>Price:</strong> {{ $repair->price }}</p>
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
            </span>
            @endif
          </div>         
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <strong>Price : </strong> £ {{ $repair->price }}
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <strong>Created Date : </strong> {{ $repair->created_at }}
          </div>
        </div>
      </div>

        <div class="col-md-6">
          <div class="col-md-12">
            <div class="form-group">
              <strong> IMEI : </strong> {{ $repair->imei }}
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <strong>Type : </strong> {{ $repair->type }}
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <strong>Discription : </strong> {{ $repair->discription }}
            </div>
          </div>
           <div class="col-md-12">
          <div class="form-group">
            <strong>Parts : </strong> {{ $repair->parts }}
          </div>
        </div>
        </div>

      <div class="col-md-12">
        <a href="{{route('repair.index')}}" class="btn btn-sm btn-success">Back</a>
        @if($repair->status == 1)
        <a href="{{action('RepairController@printReceipt', $repair->id)}}" class="btn btn-sm btn-info">Download Receipt
        </a>
        @else
        <a href="{{action('RepairController@showReceipt', $repair->id)}}" class="btn btn-sm btn-info" target="_blank">View Receipt
        </a>
        @endif
      </div>
    </div>
  </div>
@endsection
