@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Customer</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> there where some problems with your input.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('customer.update',$customer->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>First name:</strong>
          <input type="text" name="fname" class="form-control" value="{{$customer->fname}}">
          <strong>Last name:</strong>
          <input type="text" name="lname" class="form-control" value="{{$customer->lname}}">

        </div>
        <div class="col-md-12">
          <strong>Address</strong>
          <input type="text" name="address" class="form-control" value="{{$customer->address}}">
          <strong>Phone</strong>
          <input type="text" name="phone" class="form-control" value="{{$customer->phone}}">

        </div>
        <div class="col-md-12">
          <a href="{{route('customer.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
@endsection
