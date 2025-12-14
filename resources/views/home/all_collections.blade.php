<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css') 
</head>
<body>
    @include('home.header') <!-- HEADER BLADE -->

    <!-- Figurine Section -->
<section id="collections" class="collections">
    <div class="collections-text">
        <h1>All Available Figurines</h1>
     
    </div>
    <div class="card-container">

        @foreach ($product as $product)
        <div class="card">
            <img src="products/{{ $product->product_image }}">
            <div class="card-content">
                <h3>{{ $product->product_name }}</h3>
                <!--
                <p>{{ $product->product_description }}</p>

                <div class="price-qty">
                    <p><strong>Price:</strong>{{ $product->product_price }}</p>
                    <p><strong>Qty:</strong>{{ $product->product_quantity }}</p>
                </div> -->

                <div class="card-buttons">
                    <a href="{{ url('product_details', $product->id) }}" class="btn view-btn"> View Details</a>

                    @if (!Auth::check() || Auth::user()->user_type !== 'admin')
                    <a href="{{ url('add_to_cart', $product->id) }}" class="btn cart-btn">Add to Cart</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach

    </div>
</section>

    @include('home.footer')

    
    <!-- BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    
</body>
</html> 
