<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Resources\BusinessesResource;
use App\Http\Resources\JobsResource;

class BusinessesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('businesses.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $business = Business::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return new BusinessesResource($business);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        $jobs = Job::where('business_id', $business->id)->get();
        return  [
            'id' => (string)$business->id,
            'name' => $business->name,
            'email' => $business->email,
            'attribute' => 'business',
            'jobs' => $jobs
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        $current_business = $business;

        $business->where('id', $business->id)
                ->update([
                    'name' => $request->name ?? $current_business->name,
                    'email' => $request->email ?? $current_business->email,
                    'password' => $request->password ?? $current_business->password,
                ]);
        
        return new BusinessesResource($business);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        $business->delete();
        return response()->json(null, 204);
    }
}
