<?php

namespace App\Http\Controllers;
use Session;
use App\Models\account;
use App\Models\Categories;
use App\Models\Products;
use App\Models\reviews;
use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    //[get] /home
    public function homePage($id){
        $result = account::where('id',$id)
                ->take(1)
                ->get();
        $categories = Categories::all();
        $products = Products::where('id','>','0' )
                ->take(6)
                ->get();
        $newestProducts = Products::where('id','>','0')
                ->take(6)
                ->orderBy('id', 'desc')
                ->get();
        $reviewProduct  = reviews::where('id','>','0')
                ->take(5)
                ->get();
        $cart = Carts::where('account_id',$id)
                ->where('ordered',0)
                ->get();
        // return all this stuff
        return view('home/home')
                ->with('user',$result[0])
                ->with('categories',$categories)
                ->with('products',$products)
                ->with('newestProducts',$newestProducts)
                ->with('reviews',$reviewProduct)
                ->with('carts',$cart)
        ;
        // return $cart;
    }
    public function Products($id){
        $user = account::where('id',$id)
                ->take(1)
                ->get();
        $product = Products::all();
        $categories = categories::all();
        $cart = Carts::where('account_id',$id)
                ->where('ordered',0)
                ->get();
        return view('Home/product_list')
                ->with('id',$id)
                ->with('user',$user[0])
                ->with('products',$product)
                ->with('categories',$categories)
                ->with('sortBy','sắp xếp theo')
                ->with('carts',$cart)
                ;
        
    }
    public function NewestProducts($id){
        $newestProducts = Products::where('id','>','0')
                ->take(6)
                ->orderBy('id', 'desc')
                ->get();
        $user = account::where('id',$id)
                ->take(1)
                ->get();
        $categories = categories::all();
        $cart = Carts::where('account_id',$id)
                ->where('ordered',0)
                ->get();
        return view('Home/product_list')
                ->with('id',$id)
                ->with('user',$user[0])
                ->with('products',$newestProducts)
                ->with('categories',$categories)
                ->with('sortBy','Sản Phẩm Mới Nhất')
                ->with('carts',$cart)
                ;
    }
    public function OldestProducts($id){
        $oldestProducts = Products::where('id','>','1')
                ->take(6)
                ->orderBy('id', 'asc')
                ->get();
        $user = account::where('id',$id)
                ->take(1)
                ->get();
        $categories = categories::all();
        $cart = Carts::where('account_id',$id)
                ->where('ordered',0)
                ->get();
        return view('Home/product_list')
                ->with('id',$id)
                ->with('user',$user[0])
                ->with('products',$oldestProducts)
                ->with('categories',$categories)
                ->with('sortBy','Sản Phẩm cũ nhất')
                ->with('carts',$cart)
                ;
    }
    public function SearchProducts($id,Request $request){
        $keyword = $request->input("keyword");
        $foundProducts = Products::where('ProductsName','LIKE','%'. $keyword . '%')->get();
        $user = account::where('id',$id)
                ->take(1)
                ->get();
        $categories = categories::all();
        $cart = Carts::where('account_id',$id)
                ->where('ordered',0)
                ->get();
        return view('Home/product_list')
                ->with('id',$id)
                ->with('user',$user[0])
                ->with('products',$foundProducts)
                ->with('categories',$categories)
                ->with('sortBy','Xắp xếp theo')
                ->with('carts',$cart)
                ;
        // return $request->keyword;
    }
    public function ProductDetail($id,$product_id){
        $instance = Products::where('id',$product_id)
                ->take(1)
                ->get();
        $instance = $instance[0];
        $categories = categories::all();
        $user = account::where('id',$id)
                ->take(1)
                ->get()[0];
                $cart = Carts::where('account_id',$id)
                ->where('ordered',0)
                ->get();
        $thisProductCategories = Categories::where('id',$instance->categories_id)
                ->take(1)
                ->get();
        return view('Home/product_detail')
                ->with('product',$instance)
                ->with('user',$user)
                ->with('categories',$categories)
                ->with('thisCategories',$thisProductCategories[0])
                ->with('carts',$cart)
                ;
    }   
    public function CategoriesProduct($id,$categories_id,Request $request){
        $user = account::where('id',$id)
                ->take(1)
                ->get()[0];
        $ThisCategories = Categories::where('id',$categories_id)
                ->take(1)
                ->get()[0];
        $categories = categories::all();
        $cart = Carts::where('account_id',$id)
                ->where('ordered',0)
                ->get();
        return view('Home/categories_product_list')
                ->with('user',$user)
                ->with('thisCategories',$ThisCategories)
                ->with('categories',$categories)
                ->with('carts',$cart)
        ;
    }
    ////////CART 
    public function AddToCart($id,$product_id){
        $newCart = new Carts();
        $newCart->account_id  = $id;
        $newCart->product_id = $product_id;
        $newCart->ordered = 0;
        $newCart->save();
        return Redirect::back();
    }
    public function BuyNow($id,$product_id){
        $newCart = new Carts();
        $newCart->account_id  = $id;
        $newCart->product_id = $product_id;
        $newCart->ordered = 0;
        $newCart->save();
        return redirect()->route('cart',$id);
    }
    public function cart($id){
        $user = account::where('id',$id)
                ->take(1)
                ->get()[0];
        $products = $user->Cart;
        $array_of_product = array();
        foreach($products as $item){
                if($item->ordered == 0){
                        array_push($array_of_product,$item->Product);
                }
                else{
                }
        }
        return view('Home/cart')
                ->with('user',$user)
                ->with('products',$array_of_product)
                ;
    }
    ///other
    public function contact($id){
        $user = account::where('id',$id)
                ->take(1)
                ->get()[0];
        return view('other/contact')
                ->with('user',$user);
    }
}

