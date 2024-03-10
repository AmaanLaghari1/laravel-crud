@extends('base')

@section('main')
    <div class="container">
        <h2 class="my-2">Update Product</h2>
        <div class="row justify-content-center">
          @if($message = Session::get('success'))
            <div class="alert alert-success">{{$message}}</div>
          @endif
            <div class="col-8">
                <form action="/updated/{{$product->id}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                    <div class="form-group my-2">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{old('name', $product->name)}}">
                        @if($errors->has('title'))
                            <div class="text-danger">
                              {{ $errors->first('title') }}
                            </div>
                        @endif
                      </div>
                      <div class="form-group my-2">
                        <label for="" class="form-label">Description</label>
                        <input type="text" class="form-control" name="desc" value="{{old('desc', $product->description)}}">
                        @if($errors->has('desc'))
                            <div class="text-danger">
                              {{ $errors->first('desc') }}
                            </div>
                        @endif
                      </div>
                      <div class="form-group my-2">
                        <label for="" class="form-label">Image</label>
                        <input type="file" class="form-control" name="img" value="{{old('img')}}">
                        @if($errors->has('img'))
                            <div class="text-danger">
                              {{ $errors->first('img') }}
                            </div>
                        @endif
                        <img src="/uploads/{{$product->image}}" alt="" width="200">
                    </div>
                    <button type="submit" class="mb-2 btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>

@endsection