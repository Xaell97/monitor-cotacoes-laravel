@extends('layouts.app') 
 
@section('title', 'Editar Alerta') 
 
@section('content') 
 
<div class="row justify-content-center">  
    <div class="col-lg-7"> 
        <div class="card card-custom p-4"> 
            <h3 class="mb-4"> Editar Alerta </h3> 
            <form action="{{ route( 'alerts.update', $alert ) }}" 
            method="POST" > 
                @csrf 
                @method('PUT') 
                <div class="mb-3"> 
                    <label class="form-label"> Ativo </label> 
                    <select name="asset_id" class="form-select" required > 
                        @foreach($assets as $asset) 
                            <option value="{{ $asset->id }}" @selected( 
                                    old( 'asset_id', $alert->asset_id ) == $asset->id ) > 
                                {{ $asset->name }} 
                                ({{ $asset->code }}) 
                            </option> 
                        @endforeach 
                    </select> 
                </div> 
                <div class="mb-3"> 
                    <label class="form-label"> Condição </label> 
                    <select name="condition" class="form-select" required > 
                        <option value="above" @selected( 
                                old( 'condition', $alert->condition ) === 'above' ) > 
                                Maior ou igual 
                        </option> 
                        <option value="below" @selected( 
                                old( 'condition', $alert->condition ) === 'below' ) > 
                                Menor ou igual 
                        </option> 
                    </select> 
                </div> 
                <div class="mb-3"> 
                    <label class="form-label"> Preço alvo </label> 
                    <input type="number" name="target_price" step="0.0001" min="0.0001" value="{{ 
                    old( 'target_price', $alert->target_price ) }}" class="form-control" required > 
                </div> 
                <button type="submit" class="btn btn-cyan" > Atualizar Alerta </button> 
            </form> 
        </div> 
    </div> 
</div> 
 
@endsection
