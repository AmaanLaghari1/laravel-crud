@extends('base')

@section('main')
    <div class="container">
        <h2 class="my-2">All Products</h2>
          @if($message = Session::get('success'))
            <div class="alert alert-success">{{$message}}</div>
          @endif
        <a href="/add-product" class="btn btn-primary mb-1">Add New</a>
        <table class="table table-dark table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>IMAGE</th>
                <th>ACTIONS</th>
            </tr>
            @foreach($products as $prod)
              <tr>
                <td>{{$prod->id}}</td>
                <td>{{$prod->name}}</td>
                <td>{{$prod->description}}</td>
                <td>
                  <img alt="product image" src="/uploads/{{$prod->image}}" alt="" width="50" height="50" class="rounded-circle">
                </td>
                <td>
                  <a href="/update-product/{{$prod->id}}" class="btn btn-sm btn-success">Update</a>
                  <a href="/delete-product/{{$prod->id}}" class="btn btn-sm btn-danger mx-1">Delete</a>
                </td>
              </tr>
            @endforeach
        </table>
    </div>

@endsection