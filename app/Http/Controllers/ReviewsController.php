<?php

namespace App\Http\Controllers;

use App\Models\reviews;
use App\Models\account;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = reviews::all();
        return view('WebAdmin/reviewManagerment/index')
                ->with('review',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allAccount = account::all();
        return view('WebAdmin/reviewManagerment/create')->with('account',$allAccount);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new reviews();
        $review->ReviewsName = $request->input('reviewName');
        $review->comment = $request->input('comment');
        $review->star = $request->input('star');
        $review->account_id = $request->input('account');
        $review->save();
        return redirect()->route('review.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reivews  $reivews
     * @return \Illuminate\Http\Response
     */
    public function show(reviews $reviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reivews  $reivews
     * @return \Illuminate\Http\Response
     */
    public function edit(reviews $reviews,$id)
    {
        $allAccount = account::all();
        return view('WebAdmin/reviewManagerment/update')
                ->with('account',$allAccount)->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reivews  $reivews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $newReview = reviews::where('id',$id)
                    ->take(1)
                    ->get();
        $newReview[0]->ReviewsName = $request->input('reviewName');
        $newReview[0]->comment = $request->input('comment');
        $newReview[0]->star = $request->input('star');
        $newReview[0]->account_id = $request->input('account');
        $newReview[0]->save();
        return redirect()->route('review.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reivews  $reivews
     * @return \Illuminate\Http\Response
     */
    public function destroy(reviews $reivews,$id)
    {
        $deleteObject = reviews::where('id',$id)
                        ->take(1)
                        ->get();
        $deleteObject[0]->delete();
        return redirect()->route('review.index');        
    }
}
