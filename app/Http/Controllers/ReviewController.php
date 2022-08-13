<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Testimonial::all();
        return view('admin.review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.review.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $directory = 'images/review/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;

        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'review' => 'required'
        ]);

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->company = $request->company;
        $testimonial->image = $imageUrl;
        $testimonial->review = $request->review;
        $testimonial->save();

        return back()->with('message','Review Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Testimonial::findOrFail($id);
        return view('admin.review.edit', compact('review'));
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
        $review = Testimonial::findOrFail($id);
        $reviewImage = $request->file('image');
        if($reviewImage){

            unlink($review->image);
            $imageName = $reviewImage->getClientOriginalName();
            $directory = 'images/review/';
            $reviewImage->move($directory, $imageName);
            $imageUrl = $directory.$imageName;

            $review->name = $request->name;
            $review->company = $request->company;
            $review->image = $imageUrl;
            $review->review = $request->review;
            $review->save();
        }
        else{
            $review->name = $request->name;
            $review->company = $request->company;
            $review->review = $request->review;
            $review->save();
        }
        return back()->with('message','Review updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        unlink($testimonial->image);
        $testimonial->delete();
        return back();
    }
}
