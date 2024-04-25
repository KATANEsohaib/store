<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  </head>
  <body>


    @include('admin.sidebar')

  
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">

    


    
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product as $products)
                <tr>
                    <td>
                        <img src="{{ asset('storage/'.$products->image) }}" alt="{{ $products->name }}" width="50px">
                    </td>
                    <td>{{ $products->name }}</td>
                    <td>{{ $products->price }}</td>
                    <td >{{Str::limit($products->description, 100)}}</td>
                    <td>
                        <a href="/deleteproduct/{{ $products->id }}" class="btn btn-danger">delete</a>
                        <a href="/updateview/{{ $products->id  }}" class="btn btn-primary">Update</a>
                        <a href="/produits/{{ $products->id  }}" class="btn btn-primary">show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
         <!-- partial -->
         @include('admin.script')
        </body>
      </html>