<!-- resources/views/auth/signin.blade.php -->
@extends('layouts.app')

@section('title', 'Sign In')

<style>
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 900px;
    }

    .form-title {
        font-size: 50px;
        font-weight: bold;
        margin-bottom: 1.5rem;
        color: ##ff6b6b;;
        text-align: center;
    }

    .form-label {
        display: block;
        margin: 1rem;
    }

    .form-input {
        width: 100%;
        padding-right: 20rem;
        background-color: #2f3237;
        color: #F3F4F6;
        border-radius: 0.25rem;
    }

    .form-button {
        background-color: ##ff6b6b;;
        border: none;
        color: #F3F4F6;
        padding: 1rem 1rem;
        border-radius: 0.25rem;
        width: 100%;
        margin-top: 1rem;
        cursor: pointer;
        margin-top:50px;
    }

    .form-button:hover {
        background-color: #ef5350;
    }

    .footer {
        background-color: #4B5563;
        color: #9CA3AF;
        padding: 1rem 0;
        text-align: center;
        position: absolute;
        bottom: 0;
        width: 100%;
    }
    .alert-error {
    display: flex;
    align-items: center;
    background-color: #ffebee;
    border-left: 4px solid #f44336;
    margin-bottom: 15px;
    padding: 10px;
    border-radius: 4px;
    animation: fadeIn 0.3s ease-in-out;
}

.alert-error-icon {
    width: 30px;
    height: 30px;
    background-color: #f44336;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    margin-right: 15px;
    font-weight: bold;
    font-size: 18px;
}

.alert-error-content {
    flex-grow: 1;
    color: #d32f2f;
}

.alert-error-content ul {
    margin: 0;
    padding-left: 20px;
}

.alert-error-content li {
    margin-bottom: 5px;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

@section('content')
    <div class="form-container">
        <div class="form-box">
            <h2 class="form-title">Sign In</h2>

            @if(session('error'))
                <div class="alert-error">
                    <div class="alert-error-icon">!</div>
                    <div class="alert-error-content">
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="alert-error">
                    <div class="alert-error-icon">!</div>
                    <div class="alert-error-content">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-input"
                           value="{{ old('email') }}" required placeholder="Type your email">
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-input"
                           required placeholder="Type your password">
                </div>
                <button type="submit" class="form-button">Sign In</button>
            </form>
        </div>
    </div>
@endsection


