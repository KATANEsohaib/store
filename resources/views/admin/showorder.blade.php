<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                    
                    <th scope="col">Nom</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Adress</th>
                    <th scope="col">Nom de produit</th>
                    <th scope="col">Quantiter</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order as $orders)
                <tr>
                  
                    <td>{{ $orders->name }}</td>
                    <td>{{ $orders->phone }}</td>
                    <td >{{$orders->adress}}</td>
                    <td >{{$orders->product_name}}</td>
                    <td >{{$orders->quantity}}</td>
                    <td >{{$orders->price}}</td>
                    <td >{{$orders->status}}</td>
                    <td><a class="btn btn-success" href="updatestatus/{{ $orders->id }}" role="button">DELIVERED</a></td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
         <!-- partial -->
         @include('admin.script')
        </body>
</html>