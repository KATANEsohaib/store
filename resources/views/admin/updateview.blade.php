<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')
  </head>
  <body>


    @include('admin.sidebar')

    
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
        <h1>this is updateproduct page</h1>

        <form action="{{route ('updateproduct', $product->id)}}" method="POST" enctype="multipart/form-data">
           @csrf
         @method('PUT')
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div>
                <h3>Current Image</h3>
                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" width="50px"/>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         
        </form>
        
    </div>

    <!-- partial -->
    @include('admin.script')
  </body>
</html>
