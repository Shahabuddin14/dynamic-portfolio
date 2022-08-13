<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
        $directory = 'images/service/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;

        $request->validate([
            'name' => 'required',
            'details' => 'required'
        ]);
        $service = new Service();
        $service->name = $request->name;
        $service->icon = $imageUrl;
        $service->details = $request->details;
        $service->save();

        return back()->with('message','Service Added Successfully');
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
        $service = Service::findOrFail($id);
        return view('admin.service.edit', compact('service'));
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
        $service = Service::find($id);
        $serviceImage = $request->file('image');
        if($serviceImage){

            unlink($service->icon);
            $imageName = $serviceImage->getClientOriginalName();
            $directory = 'images/service/';
            $serviceImage->move($directory, $imageName);
            $imageUrl = $directory.$imageName;
            $service->name = $request->name;
            $service->icon = $imageUrl;
            $service->details = $request->details;
            $service->save();
        }
        else{
            $service->name = $request->name;
            $service->details = $request->details;
            $service->save();
        }
        return back()->with('message','Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        unlink($service->icon);
        $service->delete();
        return back();
    }
}
