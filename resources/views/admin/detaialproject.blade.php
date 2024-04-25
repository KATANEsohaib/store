<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>détails</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>

<div class="container pt-5">
    <h1>Information sur le produit : </h1>
    <div class="row">
        <div class="col-lg-6" style="
            height: 50vh;
            overflow: hidden;">
            <img src="{{ asset('storage/'.$product->image) }} " alt="" style="
            object-fit: cover;
            width: 50%;
            height: 100%;">
        </div>
        <div class="col-lg-6">
            <table class="table">
                <thead>
                 
                    <tr>
                        <th scope="col">nom produit</th>
                        <td>{{$product->name}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Prix produit</th>
                        <td>{{$product->price}}</td>
                    </tr>
                
                    <tr>
                        <th scope="col">Description produit</th>
                        <td>{{$product->description}}</td>
                    </tr>
                    
                    <tr>
                        <a class="btn btn-success" href="/showproduct">Back</a>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>





</body>
</html>