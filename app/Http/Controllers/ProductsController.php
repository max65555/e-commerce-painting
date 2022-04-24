<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\account;
use App\Models\categories;
use App\Models\reviews;
use Illuminate\Http\Request;
use SessionUpdateTimestampHandlerInterface;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Products::all();
        return view('WebAdmin/ProductManagerment/index')->with('products',$result);
            

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categories::all();
        $reviews = reviews::all();
        return view('WebAdmin/ProductManagerment/create')
            ->with('categories',$categories)
            ->with('reviews',$reviews);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productName = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        $categoriesID = $request->input('categoriesID');
        $reviewsID = $request->input('reviewsID');
        //change name of this shit (take me almost 1 hour to figure out )
        $newimageName = time() .'-' . $request->name .'.' . $request->imagePath->extension();
        
        // move to public
        $request->imagePath->move('uploads/product/',$newimageName);
        //create a object product
        $product = Products::create([
            'ProductsName' => $productName,
            'Price' => $price,
            'description' =>$description,
            'categories_id' => $categoriesID,
            'reviews_id' =>$reviewsID,
            'imagePath' => $newimageName,
        ]);
        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $product = Products::where('id',$id)
        //                 ->take(1)
        //                 ->get();
        // return $product[0];
        $categories = categories::all();
        $reviews = reviews::all();
        return view('WebAdmin/ProductManagerment/update')
            ->with('categories',$categories)
            ->with('reviews',$reviews)
            ->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $product = Products::where('id',$id)
                        ->take(1)
                        ->get();
        $updateProduct =  $product[0];
        $productName = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        $categoriesID = $request->input('categoriesID');
        $reviewsID = $request->input('reviewsID');
        //change name of this shit (take me almost 1 hour to figure out )
        $newimageName = time() .'-' . $request->name .'.' . $request->imagePath->extension();
        // move to public
        $request->imagePath->move('uploads/product/',$newimageName);
        $updateProduct->ProductsName = $productName;
        $updateProduct->Price = $price;
        $updateProduct->description = $description;
        $updateProduct->categories_id = $categoriesID;
        $updateProduct->reviews_id = $reviewsID;
        $updateProduct->imagePath = $newimageName;
        $updateProduct->save();
        return redirect()->route('product.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::where('id', $id)
                    ->take(1)
                    ->get();
        $product[0]->delete();
        return redirect()->route('product.index');
    }
}
