
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>


    @include('admin.sidebar')

    
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
        <h1>this is product page</h1>

        <form action="{{ route('comment.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
          </div>

    
    

   
    

 
          <!-- partial -->
          @include('admin.script')
  </body>
</html>