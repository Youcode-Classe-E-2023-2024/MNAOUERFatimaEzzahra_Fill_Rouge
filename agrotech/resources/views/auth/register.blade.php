@extends('layout.auth')

@section('content')
    <main class="form-signin">
        <form action="{{ route('register.store') }}" method="post">
            @csrf

            <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
            <div class="form-floating">
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email address</label>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-floating">
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="floatingUsername" placeholder="Username" required>
                <label for="floatingUsername">Name</label>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-floating">
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-floating">
                <input name="password_confirmation" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Confirm Password</label>
            </div>

            <button name="login" class="w-100 btn btn-lg " style="background-color: #81c408 ;" type="submit">Sign in</button>
            <a href="{{ route('register') }}" class="w-100 btn btn-lg" style="background-color: #ffb524;" type="button">Sign up</a>
            <a href="{{ route('home') }}" class="w-100 btn btn-lg btn-primary mt-2" type="button">Back</a>
            <p class="mt-5 mb-3 text-muted">&copy; AGROTECH - 2024</p>
        </form>

    </main>
@endsection
