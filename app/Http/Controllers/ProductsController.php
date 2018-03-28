<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'name' => 'required',
                'price' => 'required|numeric'
            ]);


        $product = new Product;


        //Upload main_image file
        if( $request->hasFile('main_image') ) {
            $file = $request->file('main_image');

            $file->move('img/'.$request->name, 'main.jpg');
            // $file->move('img/'.$product->name, 'main.'.$file->getClientOriginalExtension());
            
            $product->main_image_Path = "/img/$request->name/main.jpg";
        }

        $product->name = $request->name;
        $product->details = $request->details;
        $product->dimensions = $request->dimensions;
        $product->thickness = $request->thickness;
        $product->weight = $request->weight;
        $product->price = $request->price;
        $product->min_quantity = $request->min_quantity;
        $product->save();

         //Upload product_Images files and save to db
        if( $request->hasFile('images') ) {
            foreach($request->file('images') as $file){

                $file->move('img/'.$product->name, $file->getClientOriginalName());
                
                $product_image = new ProductImage;
                $product_image->product_id = $product->id;
                $product_image->path = '/img/'.$product->name.'/'.$file->getClientOriginalName();
                $product_image->save();
            }
        }

        session()->flash('message', 'Product Has been Created Successfully');

        return redirect()->route('products.show', [$product->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
                'main_image' => 'image|mimes:jpeg,png,jpg,gif,svg'
            ]);



        $product = Product::findOrFail($id);


        //Upload main_image file
        if( $request->hasFile('main_image') ) {
            $file = $request->file('main_image');

            $file->move('img/'.$product->name, 'main.jpg');
            // $file->move('img/'.$product->name, 'main.'.$file->getClientOriginalExtension());
            
            $product->main_image_Path = "/img/$product->name/main.jpg";
        }


        //Upload product_Images files and save to db
        if( $request->hasFile('images') ) {
            foreach($request->file('images') as $file){

                $file->move('img/'.$product->name, $file->getClientOriginalName());
                
                $product_image = new ProductImage;
                $product_image->product_id = $product->id;
                $product_image->path = '/img/'.$product->name.'/'.$file->getClientOriginalName();
                $product_image->save();
            }
        }

        $product->name = $request->name;
        $product->details = $request->details;
        $product->dimensions = $request->dimensions;
        $product->thickness = $request->thickness;
        $product->weight = $request->weight;
        $product->price = $request->price;
        $product->min_quantity = $request->min_quantity;
        $product->update();

        session()->flash('message', 'Changes Has been Saved Successfully');

       return redirect()->route('products.show', [$product->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_image($image_id)
    {
        $product_image = ProductImage::findOrFail($image_id);
        $product_image->delete();

        session()->flash('message', 'Image Removed Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        session()->flash('message', 'Image Removed Successfully');
        return redirect()->route('products.index');
    }
}
