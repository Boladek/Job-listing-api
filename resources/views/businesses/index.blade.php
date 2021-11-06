@extends('layouts.app')

@section('content')
    <div class="home-container">
        <h1>Welcome to Job Listings</h1>
        <h3>Your #1 platform for recruiter and job seekers</h3>
        <p>Here at Job Listings, you get to opportunity for find jobs you want and apply for them.</p>
        <div class="login-signup">
            <a href="businesses/signup"><button>Signup</button></a>
            <a href="businesses/login"><button>Login</button></a>
            <a href="businesses/index"><button>Guest</button></a>
        </div>
    </div>
@endsection