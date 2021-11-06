@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="" method="post">
            <div class="container">
                <label for="uname"><b>Name</b></label>
                <input type="text" placeholder="Enter Business Name" name="name" required>

                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit">Signup</button>
                <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>
        </form>
    </div>
@endsection