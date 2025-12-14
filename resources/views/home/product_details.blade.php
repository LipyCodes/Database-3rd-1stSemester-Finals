<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        .product-dets .container {
            max-width: 600px;
            margin: 155px auto 100px auto;
            padding: 30px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        .product-dets img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        .product-dets h1 {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .description-box {
            width: 100%;
            margin: 20px auto;
            padding: 15px;
            border: 1px solid #ddd;
            background: #fff;
            border-radius: 5px;
            text-align: center;
        }

        .description-box p {
            margin: 0;
            font-size: 1.1rem;
            color: #333;
        }

        .product-dets p {
            font-size: 20px;
            margin: 8px 0;
            color: #333;
        }

        .product-dets .product-info {
            display: flex;
            justify-content: space-between;
            font-size: 1.2rem;
            margin: 30px 0;
            margin-right: 50px;
            margin-left: 50px;
        }

        .add-to-cart-btn {
            background-color: #28a745;
            color: white;
            padding: 12px 25px;
            font-size: 1.2rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 20px;
            transition: background 0.3s ease;
        }

        .add-to-cart-btn:hover {
            background-color: #218838;
        }
    </style>

    @include('home.css')
</head>

<body>
    @include('home.header') <!-- HEADER BLADE -->

    <!-- Figurine Section -->
    <section id="product-dets" class="product-dets">
        <div class="container">

            <h1>Figurine Details</h1>

            <img src="/products/{{ $data->product_image }}" alt="{{ $data->product_name }}">
            <h1>{{ $data->product_name }}</h1>

            <div class="description-box">
                <p>{{ $data->product_description }}</p>
            </div>

            <p><strong>Category:</strong> {{ $data->product_category }}</p>

            <div class="product-info">
                <span class="price"><strong>Price:</strong> ${{ $data->product_price }}</span>
                <span class="quantity"><strong>Quantity:</strong> {{ $data->product_quantity }}</span>
            </div>
            @if (!Auth::check() || Auth::user()->user_type !== 'admin')
            <a class="add-to-cart-btn" href="{{ url('add_to_cart', $data->id) }}">Add to Cart</a>
            @endif
        </div>
    </section>

   @include('home.footer')
    <!-- BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>