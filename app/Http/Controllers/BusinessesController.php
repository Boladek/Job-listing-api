<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Resources\BusinessesResource;
use App\Http\Resources\JobsResource;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

class BusinessesController extends Controller
{
    use HasApiTokens;
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
            'password' => Hash::make($request->password)
        ]);

        return new BusinessesResource($business);
    }

    public function login(Request $request)
    {
        $business = $this->validate($request, [
            'email' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string', 'max:30',]
        ]);

        $realBusiness = Business::where('email', $business['email'])->first();

        if(!$realBusiness) {
            return response()->json([
                'message' => 'Business not found'
            ], 404);
        } else {
            if(!Hash::check($business['password'], $realBusiness['password'])) {
                return response()->json([
                    'message' => 'Password is incorrect'
                ], 404);
            } else {
                $accessToken = Hash::make('accessTokenHash');

                return [new BusinessesResource($realBusiness), 'accessToken' => $accessToken];
            }
        }
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
