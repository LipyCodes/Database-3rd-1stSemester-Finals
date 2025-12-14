<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Monolog\Handler\RedisHandler;
use PhpParser\Node\Expr\FuncCall;

use function Flasher\Toastr\Prime\toastr;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category;

        $category->save();

        toastr()->timeOut(3000)->closeButton()->addSuccess('Category Added Successfully!');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();

        toastr()->timeOut(3000)->closeButton()->addSuccess('Category Deleted Successfully!');
        return redirect()->back();
    }

    public function add_product()
    {
        $category = Category::all();


        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $data = new Product;
        $data->product_name = $request->name;
        $data->product_description = $request->description;
        $data->product_category = $request->category;
        $data->product_price = $request->price;
        $data->product_quantity = $request->qty;
        
        $image = $request->image;

            if($image)
            {
                $imagename = time().'.'.$image->getClientOriginalExtension();

                $request->image->move('products', $imagename);

                $data->product_image = $imagename;
            }

        $data->save();

        toastr()->timeOut(3000)->closeButton()->addSuccess('Product Added Succesfully!');
        return redirect()->back();
    }

    public function view_product()
    {
        $product = Product::paginate(5);
        return view('admin.view_product', compact('product'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);

        //DELETES THE IMAGE FROM public>products FOLDER
        $image_path = public_path('products/'.$data->product_image); 
        if(file_exists($image_path))
        {
            unlink($image_path);
        }

        $data->delete();

        toastr()->timeOut(3000)->closeButton()->addSuccess('Category Deleted Successfully!');
        return redirect()->back();
    }

    public function edit_product($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.edit_product', compact('data','category'));
    }

    public function update_product(Request $request, $id)
    {
        $data = Product::find($id);
        
        $data->product_name = $request->name;
        $data->product_description = $request->description;
        $data->product_category = $request->category;
        $data->product_price = $request->price;
        $data->product_quantity = $request->qty;
        
        $image = $request->image;
        
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('products',$imagename);
            $data->product_image = $imagename;
        }

        $data->save();
        toastr()->timeOut(3000)->closeButton()->addSuccess('Product Edited Succesfully!');
        return redirect('/view_product');
    }

}   
