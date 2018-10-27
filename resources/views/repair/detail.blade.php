@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Customer Details</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="col-md-12">
          <div class="form-group">
            <strong>Customer : </strong> {{ $repair->customer->fname }}  {{ $repair->customer->lname }}
          </div>
        </div>


        <div class="col-md-12">
          <div class="form-group">
            <strong>Brand : </strong> {{ $repair->brand }}
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <strong>Status : </strong>
            @if($repair->status === 1 )
            <span class="btn btn-success disabled" role="button">
              Done
            </span>
            @else
            <span class="btn btn-danger" role="button">
              Pending
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
            <strong>Date : </strong> {{ $repair->created_at }}
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
        </div>

      <div class="col-md-12">
        <a href="{{route('repair.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection
