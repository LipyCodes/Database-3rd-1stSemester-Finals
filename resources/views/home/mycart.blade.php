<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css') 

    <style>
        h1{
            text-align: center;
            margin-top: 150px;
            margin-bottom: 50px;
            font-weight: bolder;
        }

        .table_design{
            display:flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 150px;
        }

        table{
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }

        th{
            border: 2px solid black;
            text-align: center;
            color: black;
            font: 20px;
            font-weight: bolder;
        }

        td{
            border: 1px solid black;
        }

    </style>

</head>
<body>
    @include('home.header') <!-- HEADER BLADE -->
    
    
    <h1>My Cart</h1>
    <div class="table_design">
        <table>
            <tr>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Image</th>
                <th>Remove</th>
            </tr>

            @foreach($cart as $cart)
            <tr>
                <td>{{$cart->product->product_name}}</td>
                <td>{{$cart->product->product_price}}</td>
                <td>
                    <img src="/products/{{$cart->product->product_image}}" height="170px" width="170px">
                </td>
                <td>
                    <a class="btn btn-danger" href="{{url('delete_from_cart', $cart->id)}}">Remove</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    @include('home.footer')
    <!-- BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    
</body>
</html> 
