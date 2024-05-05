<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <title>Sixteen Clothing HTML Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
           <img src="logom.png" alt="logo" width="100" height="50">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="products.html">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/contact">Contact Us</a>
              </li>

              <li class="nav-item">
                @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                     
                    <li class="nav-item">
                      <a class="nav-link" href="showcart">
                        <i class="fas fa-shopping-cart"></i>
                        @if(session('cart') !== null)
                        <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span>
                    @endif</a>
                    </li>
                      
                       <li> <a href="{{ url('/dashboard') }}" class="nav-link">dashboard
                               
         </a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="nav-link">Log in</a></li>

                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                        @endif
                    @endauth
                </div>
            @endif
            </li>


            </ul>
          </div>
        </div>
      </nav>
      @if(Session::has('message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{Session::get('message')}}
      </div>
      @endif
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    
    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
            
            
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">nom de produit</th>
                <th scope="col">quantité</th>
                <th scope="col">Prix</th>
              
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
         <form action="/order" method="POST">
            @csrf
            @php
            $total = 0; // initialiser le total
        @endphp
            @if(session('cart') !== null)
            @foreach(session('cart') as $id => $details)
                <!-- Votre code de boucle foreach ici -->
          
          
            <tr>
                
                <td>
                  <input type="text" name="productname[]" hidden="">

                  {{$details['name'] }}
                </td>
                <td>
                  <input type="text" name="quantity[]"  hidden="">
                  {{$details['quantity'] }}
                </td>
                <td >
                  <input type="text" name="price[]" hidden="">
                  {{ $details['price'] * $details['quantity'] }}
                </td>
                <td>
                    
                    
                  <button type="button" class="btn btn-danger btn-sm remove-from-cart delete" data-id="{{ $id }}"><i class="fa fa-trash-o"></i>annuler</button>
                  
                </td>
                
            </tr>
           
            @php
                $total += $details['price'] * $details['quantity']; // mettre à jour le total
            @endphp
            
            @endforeach
            @endif
           
            <button type="submit" class="btn btn-success"  >Confirme order</button>
         </form>
          <h3>Total général : {{ $total }}</h3>
        </tbody>
    </table>
    
  
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>
<script >
  $(".remove-from-cart").click(function (e) {
      e.preventDefault();
      var ele = $(this);

      if (confirm("Are you sure")) {
        $.ajax({
          url: '{{ route('cart.remove') }}', // Vérifiez cette URL
          method: "DELETE",
          data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
          success: function (response) {
              window.location.reload();
          }
      });
      }

      e.stopPropagation(); // Empêche la propagation de l'événement au formulaire parent
  });
</script>

  </body>

</html>
