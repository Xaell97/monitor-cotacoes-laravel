@extends('layouts.app') 
 
@section('title', 'Novo Alerta') 
 
@section('content') 
 
<div class="row justify-content-center"> 
    <div class="col-lg-7"> 
        <div class="card card-custom p-4"> 
            <h3 class="mb-4"> Novo Alerta </h3> 
            <form action="{{ route('alerts.store') }}" method="POST" > 
                @csrf 
                <div class="mb-3"> 
                    <label class="form-label"> Ativo </label> 
                    <select name="asset_id" class="form-select 
                    @error('asset_id') is-invalid @enderror" required > 
                        <option value=""> Selecione </option> 
                        @foreach($assets as $asset) 
                            <option value="{{ $asset->id }}" @selected( old
                            ( 'asset_id', request('asset_id') ) == $asset->id ) > 
                                {{ $asset->name }} 
                                ({{ $asset->code }}) 
                            </option> 
                        @endforeach 
                    </select> 
                    @error('asset_id') 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
                    @enderror 
                </div> 
                <div class="mb-3"> 
                    <label class="form-label"> Condição </label> 
                    <select name="condition" class="form-select" required > 
                        <option value="above" @selected(old('condition') === 'above') > 
                            Maior ou igual </option> 
                        <option value="below" @selected(old('condition') === 'below') > 
                            Menor ou igual 
                        </option> 
                    </select> 
                </div> 
                <div class="mb-3"> 
                    <label class="form-label"> Preço alvo </label> 
                    <input type="number" name="target_price" step="0.0001" min="0.0001" 
                    value="{{ old('target_price') }}" class="form-control" required > 
                    @error('target_price') 
                        <div class="text-danger mt-1"> 
                            {{ $message }} 
                        </div> 
                    @enderror 
                </div> 
                <button type="submit" class="btn btn-cyan" > Salvar Alerta </button> 
            </form> 
        </div> 
    </div> 
</div> 

@endsection
