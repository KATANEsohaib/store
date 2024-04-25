

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
                     <input class="btn btn-primary" type="submit" value="Add to Cart">


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
