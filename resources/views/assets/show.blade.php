@extends('layouts.app') 
 
@section('title', $asset->name) 
 
@section('content') 
 
<div class="d-flex justify-content-between align-items-center mb-4"> 
    <div> 
        <a href="{{ route('assets.index') }}" 
        class="btn btn-outline-secondary btn-sm" > Voltar </a> 
        <h3 class="mt-2"> {{ $asset->symbol }} {{ $asset->name }} 
            <small class="text-muted"> {{ $asset->code }} 
            </small> 
        </h3> 
    </div> 
    <a href="{{ route('alerts.create') }}?asset_id={{ $asset->id }}" 
    class="btn btn-cyan" > Criar Alerta </a>  
</div> 
<div class="row g-3 mb-4"> 
    <div class="col-md-3"> 
        <div class="card card-custom p-3"> 
            <span class="text-muted"> ATUAL </span> 
            <h4 class="text-cyan"> R$ {{ number_format( $asset->current_price, 4, ',', '.' ) }} </h4> 
        </div> 
    </div> 
    <div class="col-md-3"> 
        <div class="card card-custom p-3"> 
            <span class="text-muted"> MÁXIMA </span> 
            <h4 class="text-up"> R$ {{ number_format( $asset->high_price, 4, ',', '.' ) }} </h4> 
        </div> 
    </div>
    <div class="col-md-3"> 
        <div class="card card-custom p-3"> 
            <span class="text-muted"> MÍNIMA </span> 
            <h4 class="text-down"> R$ {{ number_format( $asset->low_price, 4, ',', '.' ) }} </h4> 
        </div> 
    </div> 
    <div class="col-md-3"> 
        <div class="card card-custom p-3"> 
            <span class="text-muted"> VARIAÇÃO </span> 
            <h4> {{ $asset->variation_24h }}% </h4> 
        </div> 
    </div> 
</div> 
<div class="card card-custom overflow-hidden"> 
    <div class="p-3">
        <h5> Histórico de Cotações </h5> 
    </div> 
    <div class="table-responsive"> 
        <table class="table table-dark-custom"> 
            <thead> 
                <tr> 
                    <th>Data/Hora</th> 
                    <th>Preço</th> 
                    <th>Máxima</th> 
                    <th>Mínima</th> 
                </tr> 
            </thead> 
            <tbody> 
                @forelse($histories as $history) 
                    <tr> 
                        <td> {{ $history->fetched_at->format('d/m/Y H:i:s') }} </td> 
                        <td> R$ {{ number_format( $history->price, 4, ',', '.' ) }} </td> 
                        <td> R$ {{ number_format( $history->high_price, 4, ',', '.' ) }} </td> 
                        <td> R$ {{ number_format( $history->low_price, 4, ',', '.' ) }} </td> 
                    </tr> 
                @empty 
                    <tr> 
                        <td colspan="4" class="text-center py-5" > Nenhum histórico disponível. 
                        </td> 
                    </tr> 
                @endforelse 
            </tbody> 
        </table> 
    </div> 
    <div class="p-3"> 
        {{ $histories->links() }} 
    </div> 
</div> 
@endsection
