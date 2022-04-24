<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\account;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = account::all();
        return view('/WebAdmin/CartManagerment/index')->with('accounts',$result);
        
    }
    public function order($id){
        $account = account::where('id',$id)
                    ->take(1)
                    ->get()[0];
        // $account->Cart            
        foreach($account->Cart as $item){
            if($item->ordered == 0){
                $item->ordered = 1;
                $item->save();
            }
        }
        return redirect()->route('home',$id)
                ->with('success','Đặt hàng thành công');
        
    }
    public function accept($id){
        $account = account::where('id',$id)
                ->take(1)
                ->get()[0];
        foreach($account->Cart as $item){
            $item->ordered = 2;
            $item->save();
        }
        return redirect()->route('cart.index');
    }
    public function acceptedOrder(){
        $result = account::all();
        return view('/WebAdmin/CartManagerment/acceptedOrder')->with('accounts',$result);
    }
    public function deny($id){
        $account = account::where('id',$id)
                ->take(1)
                ->get()[0];
        foreach($account->Cart as $item){
            $item->ordered = 3;
            $item->save();
        }
        return redirect()->route('cart.index');
    }
    public function delete($id){
        // $account = account::where('id',$id)
        //         ->take(1)
        //         ->get()[0];
        $cart = Carts::where('account_id',$id)
                ->get();
        foreach($cart as $item){
            $item->delete();
        }
        return redirect()->route('cart.acceptedOrder');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function show(Carts $carts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function edit(Carts $carts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carts $carts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$product_id)
    {
        $deleteObject = carts::where('account_id',$id)
                    ->where('product_id',$product_id)
                    ->take(1)
                    ->get()[0];
        $deleteObject->delete();
        return redirect()->route('cart',$id);
    }
}
