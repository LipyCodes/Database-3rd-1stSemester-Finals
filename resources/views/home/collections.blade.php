<!-- Figurine Section -->
<section id="collections" class="collections">
    <div class="collections-text">
        <h1>New & Featured Figurines</h1>
     
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