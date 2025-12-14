<!DOCTYPE html>
<html>

<head>
  @include('admin.css')

  <style type="text/css">
            .div_design
            {
                display:flex;
                justify-content: center;
                align-items: center;
                margin-top: 30px;
            }

            h1{
                color:white;
            }

            label{
                display: inline-block;
                width: 150px;
                font-size: 15px;
                color: white !important;
                padding: 10px
            }

            textarea{
                width: 400px;
                height: 130px;
            }


        </style>
</head>

<body>

  @include('admin.header')

  @include('admin.sidebar')
  <!-- Sidebar Navigation end-->
  <div class="page-content">
    <div class="page-header">
      <div class="container-fluid">

        <h1>Edit Product</h1>

        <div class="div_design">


          <form action="{{url('update_product', $data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
              <label>Product Name</label>
              <input type="text" name="name" value="{{$data->product_name}}">
            </div>

            <div>
              <label>Product Description</label>
              <textarea name="description">{{$data->product_description}}</textarea>
            </div>

            <div>
              <label>Product Category</label>
              <select name="category">
                <option value="{{$data->product_category}}">{{$data->product_category}}</option>

                @foreach ($category as $category)
                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                @endforeach
                
              </select>
            </div>

            <div>
              <label>Product Price</label>
              <input type="text" name="price" value="{{$data->product_price}}">
            </div>

            <div>
              <label>Product Quantity</label>
              <input type="text" name="qty" value="{{$data->product_quantity}}">
            </div>

            <div>
              <label>Current Product Image</label>
              <img width="150" src="/products/{{$data->product_image}}">
            </div>

            <div>
              <label>New Product Image</label>
              <input type="file" name="image">
            </div>

            <div>
              <input class="btn btn-success" type="submit" value="Update Product">
            </div>


          </form>

        </div>
      </div>
    </div>
  </div>
  <!-- JavaScript files-->
  <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
  <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
  <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
  <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>

</html>