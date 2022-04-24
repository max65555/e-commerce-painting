<?php

namespace App\Http\Controllers;

use App\Models\account;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = account::latest()->paginate(5);
        $page = (request()->input('page',1)-1)*5;
        return view('WebAdmin/accountManagerment/index',compact('account'))
            ->with('i',$page);
        // return view('WebAdmin/accountManagerment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createForm(){
        return view('Webadmin/accountManagerment/create');
    }
    //[post] /registor/add
    public function create(Request $request)
    {
        $account = new account();
        $account->fullname =  $request->input('fullname');
        $account->password =  $request->input('password');
        $account->mobile =  $request->input('mobile');
        $account->email =  $request->input('email');
        $account->address =  $request->input('address');
        $account->save();
        return redirect('/login');
    }
    //[post] /registor/checkLogin
    public function checkLogin(Request $request){
        $result = Account::where('email',$request->email)
                ->where('password',$request->password)
                ->take(1)
                ->get();
        if(count($result) > 0){
            $accountid = $result[0]['id'];
            // return redirect('/home')->with(['user'=> $result[0]]);
            return redirect()->route('home',['id'=> $accountid]);
        }
        else{
            return redirect('/')->with('fail','input email password incorrectly !');
        }
    }
    public function add(Request $request){
        $account = new account();
        $account->fullname =  $request->input('fullname');
        $account->password =  $request->input('password');
        $account->mobile =  $request->input('mobile');
        $account->email =  $request->input('email');
        $account->address =  $request->input('address');
        $account->save();
        return redirect("/webadmin");
        // return $request;
    }
    public function changeinformation($id){
        $account = account::where('id',$id)
                ->take(1)
                ->get()[0];
        return view('Account/changeinformation')
                ->with('user',$account)
                ->with('id',$id);
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
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(account $account)
    {
        // return view('account.show',compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return view('account.edit',compact('account'));
        // return $id;
        return view("WebAdmin/accountManagerment/update")->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $result = Account::where('id',$id)
                    ->take(1)
                    ->get();
        $account = $result[0];
        $account->fullname =  $request->input('fullname');
        $account->password =  $request->input('password');
        $account->mobile =  $request->input('mobile');
        $account->email =  $request->input('email');
        $account->address =  $request->input('address');
        $account->save();
        return redirect('/webadmin');
    }
    public function updateInformation($id, Request $request)
    {
        $result = Account::where('id',$id)
                    ->take(1)
                    ->get();
        $account = $result[0];
        $account->fullname =  $request->input('fullname');
        $account->password =  $request->input('password');
        $account->mobile =  $request->input('mobile');
        $account->email =  $request->input('email');
        $account->address =  $request->input('address');
        $account->save();
        return redirect()->route('home',$id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Account::where('id',$id)
                    ->take(1)
                    ->get();

        $result[0]->delete();
        return redirect()->route('account.index')
                        ->with('success','account deleted successfully');
        // return $result[0];
    }
}
