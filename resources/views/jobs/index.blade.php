@extends('layouts.app')

@section('content')
    <div class="jobs-container">
        <h1>Jobs</h1>
        <div class="jobs">
            <div class="job">
                <a href=""><h2>Job Title</h2></a>
                <p>Job Description</p>
                <div class="job-description">
                    <span>type: </span>
                    <span>conditions: </span>
                    <span>category: </span>
                </div>
            </div>
        </div>
    </div>
@endsection