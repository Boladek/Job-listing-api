<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Resources\JobsResource;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return JobsResource::collection(Job::all());
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
        $job = Job::create([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'conditions' => $request->conditions,
            'categories' => $request->categories,
            'applied' => $request->applied,
            'business_id' => $request->business_id
        ]);

        return new JobsResource($job);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return new JobResource($job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $current_job = $job;

        $job->where('id', $job->id)->update([
            'name' => $request->name ?? $current_job->name,
            'description' => $request->description ?? $current_job->description,
            'type' => $request->type ?? $current_job->type,
            'conditions' => $request->conditions ?? $current_job->conditions,
            'categories' => $request->categories ?? $current_job->categories,
        ]);
        return new JobsResource($job);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return response()->json(null, 204);
    }
}
