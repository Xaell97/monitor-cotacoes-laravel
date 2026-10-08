@extends('layouts.guest') 
 
@section('title', 'Criar Conta') 
 
@section('content') 
 
<div class="row justify-content-center"> 
 
    <div class="col-md-5">  
        <div class="card card-custom p-4"> 
            <h3 class="text-center text-cyan mb-4"> 
                Criar Conta 
            </h3> 
 
            <form 
                method="POST" action="{{ route('register.store') }}"> 
 
                @csrf 
 
                <div class="mb-3"> 
 
                    <label class="form-label"> 
                        Nome 
                    </label> 
 
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ old('name') }}" 
                        class="form-control @error('name') 
                        is-invalid @enderror" required> 
 
                    @error('name') 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
                    @enderror 
                </div> 
 
                <div class="mb-3"> 
 
                    <label class="form-label"> 
                        E-mail 
                    </label> 
 
                    <input 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        class="form-control @error('email') 
                        is-invalid @enderror" required> 
 
                    @error('email') 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
                    @enderror 
                </div> 
 
                <div class="mb-3"> 
                    <label class="form-label"> 
                        Senha 
                    </label> 
 
                    <input
                        type="password" 
                        name="password" 
                        class="form-control @error('password') 
                        is-invalid @enderror" required> 

                    @error('password') 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
                    @enderror 
                </div> 
 
                <div class="mb-3"> 
 
                    <label class="form-label"> 
                        Confirmar senha 
                    </label> 
 
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        class="form-control" 
                        required> 
                </div> 
 
                <button 
                    class="btn btn-cyan w-100" type="submit"> Criar conta 
                </button> 
 
            </form> 
 
            <div class="text-center mt-3"> 
                <a href="{{ route('login') }}"> Já tenho uma conta 
                </a> 
            </div> 
        </div> 
    </div> 
</div> 
 
@endsection
