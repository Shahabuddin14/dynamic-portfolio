<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project_image1 = $request->file('project_image1');
        $project_image2 = $request->file('project_image2');

        $project_image1Name = $project_image1->getClientOriginalName();
        $directory = 'images/portfolio/';
        $project_image1->move($directory, $project_image1Name);
        $project_image1Url = $directory.$project_image1Name;

        $project_image2Name = $project_image2->getClientOriginalName();
        $directory = 'images/portfolio/';
        $project_image2->move($directory, $project_image2Name);
        $project_image2Url = $directory.$project_image2Name;

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'client_name' => 'required',
            'start_date' => 'required',
            'project_link' => 'required',
        ]);
        $portfolio = new Portfolio();
        $portfolio->title = $request->title;
        $portfolio->slug = SlugService::createSlug(Portfolio::class, 'slug', $request->title);
        $portfolio->description = $request->description;
        $portfolio->client_name = $request->client_name;
        $portfolio->start_date = $request->start_date;
        $portfolio->project_link = $request->project_link;
        $portfolio->project_image1 = $project_image1Url;
        $portfolio->project_image2 = $project_image2Url;
        $portfolio->save();
        return back()->with('message','Portfolio Added Successfully');

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
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit', compact('portfolio'));
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
        $portfolio = Portfolio::findOrFail($id);
        $project_image1 = $request->file('project_image1');
        $project_image2 = $request->file('project_image2');

        if($project_image1 && $project_image2)
        {
            unlink($portfolio->project_image1);
            $project_image1Name = $project_image1->getClientOriginalName();
            $directory = 'images/portfolio/';
            $project_image1->move($directory, $project_image1Name);
            $project_image1Url = $directory.$project_image1Name;

            unlink($portfolio->project_image2);
            $project_image2Name = $project_image2->getClientOriginalName();
            $directory = 'images/portfolio/';
            $project_image2->move($directory, $project_image2Name);
            $project_image2Url = $directory.$project_image2Name;

            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'client_name' => 'required',
                'start_date' => 'required',
                'project_link' => 'required',
            ]);
            $portfolio->title = $request->title;
            $portfolio->description = $request->description;
            $portfolio->client_name = $request->client_name;
            $portfolio->start_date = $request->start_date;
            $portfolio->project_link = $request->project_link;
            $portfolio->project_image1 = $project_image1Url;
            $portfolio->project_image2 = $project_image2Url;
            $portfolio->save();
        }
        elseif($project_image1)
        {
            unlink($portfolio->project_image1);
            $project_image1Name = $project_image1->getClientOriginalName();
            $directory = 'images/portfolio/';
            $project_image1->move($directory, $project_image1Name);
            $project_image1Url = $directory.$project_image1Name;

            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'client_name' => 'required',
                'start_date' => 'required',
                'project_link' => 'required',
            ]);
            $portfolio->title = $request->title;
            $portfolio->description = $request->description;
            $portfolio->client_name = $request->client_name;
            $portfolio->start_date = $request->start_date;
            $portfolio->project_link = $request->project_link;
            $portfolio->project_image1 = $project_image1Url;
            $portfolio->save();
        }

        elseif($project_image2)
        {
            unlink($portfolio->project_image2);
            $project_image2Name = $project_image2->getClientOriginalName();
            $directory = 'images/portfolio/';
            $project_image2->move($directory, $project_image2Name);
            $project_image2Url = $directory.$project_image2Name;

            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'client_name' => 'required',
                'start_date' => 'required',
                'project_link' => 'required',
            ]);
            $portfolio->title = $request->title;
            $portfolio->description = $request->description;
            $portfolio->client_name = $request->client_name;
            $portfolio->start_date = $request->start_date;
            $portfolio->project_link = $request->project_link;
            $portfolio->project_image2 = $project_image2Url;
            $portfolio->save();
        }

        else
        {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'client_name' => 'required',
                'start_date' => 'required',
                'project_link' => 'required',
            ]);
            $portfolio->title = $request->title;
            $portfolio->description = $request->description;
            $portfolio->client_name = $request->client_name;
            $portfolio->start_date = $request->start_date;
            $portfolio->project_link = $request->project_link;
            $portfolio->save();
        }
        return back()->with('message','Portfolio Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        unlink($portfolio->project_image1);
        unlink($portfolio->project_image2);
        $portfolio->delete();
        return back();
    }
}
