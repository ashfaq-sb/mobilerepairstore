@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List Customers</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('customer.create') }}">Create New Customer</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <table class="table table-hover table-sm">
      <tr>
        <th width = "50px"><b>No.</b></th>
        <th >First name</th>
        <th>Last name</th>
        <th>Address</th>
        <th>Phone</th>
        <th width = "180px">Action</th>
      </tr>

      @foreach ($customers as $customer)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$customer->fname}}</td>
          <td>{{$customer->lname}}</td>
          <td>{{$customer->address}}</td>
          <td>{{$customer->phone}}</td>
          <td>
            <form action="{{ route('customer.destroy', $customer->id) }}" method="post">
              <a class="btn btn-sm btn-success" href="{{route('customer.show',$customer->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('customer.edit',$customer->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>
    

{!! $customers->links() !!}
  </div>
@endsection
