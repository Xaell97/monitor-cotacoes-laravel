@extends('layouts.guest') 
 
@section('title', 'Login') 
 
@section('content') 
 
<div class="row justify-content-center"> 
 
    <div class="col-md-5"> 
 
        <div class="card card-custom p-4"> 
 
            <h3 class="text-center text-cyan mb-4"> 
                MarketWatch 
            </h3> 
 
            <form 
                method="POST" action="{{ route('login.store') }}" 
            > 
                @csrf 
 
                <div class="mb-3"> 
 
                    <label 
                        for="email" class="form-label" > E-mail 
                    </label> 
 
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        class="form-control @error('email') is-invalid @enderror" 
                        required > 
 
                    @error('email') 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
                    @enderror 
 
                </div> 
 
                <div class="mb-3"> 
 
                    <label 
                        for="password" class="form-label" > Senha 
                    </label> 
 
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        required > 
                </div> 
 
                <button 
                    class="btn btn-cyan w-100" type="submit" > Entrar 
                </button> 
 
            </form> 
 
            <div class="text-center mt-3"> 
                <a href="{{ route('register') }}"> Criar uma conta 
                </a> 
            </div> 
        </div> 
    </div> 
</div> 
 
@endsection
