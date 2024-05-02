


<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
          </div>
          <div>
            <form action="/search" method="GET">
            <input type="search" name="search" id="search" placeholder="Search.."/>
            <input type="submit" value="Search" class="btn btn-success"/>
            </form>
          </div>
        </div>
        
        
        @foreach ($product as $products)
        <div class="col-md-4">
            <div class="product-item">
                <a href="#"><img src="{{ asset('storage/'.$products->image) }}" alt="{{ $products->name }}"></a>
                <div class="down-content">
                    <a href="#"><h4>{{ $products->name }}</h4></a>
                    <h6>{{ $products->price }} DH</h6>
                    <p>{{Str::limit($products->description, 100)}}</p>
                    <form method="POST" action="{{url('addcart',$products->id)}}">

                      @csrf

                      <input type="number" name="quantity" min="1" max="1000" value="1" class="form-control">
                     

                     <button type="button" class="btn btn-primary addtocart"   data-id="{{ $products->id }}">add to card</button>
                    </form>
                    <ul class="stars">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span>Reviews (32)</span>
                </div>
            </div>
        </div>
        @endforeach
        </div>
      </div>
    </div>
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script>
     console.log('data-id')
      $(document).ready(function() {
    $(".addtocart").click(function(e) {
        e.preventDefault();
       // var ele = $(this);
        var productId = $(this).data('id');
        //var quantity = 1; 
console.log(productId);
        if (confirm("Ajouter ce produit au panier?")) {
            $.ajax({
                url: '/addcart/' + productId, 
                method: "POST",
                data: {_token: '{{ csrf_token() }}'},
                success: function(response) {
                  
                    console.log(response);
                    $("#badge").text(response.cartCount);
                    
                },
                error: function(error) { 
                    
                    alert(error.responseJSON.message);
                }
            });
        }
    });
});

  </script>
