@extends('layouts.app') 
 
@section('title', 'Dashboard de Cotações') 
 
@section('content') 
 
<div class="d-flex justify-content-between align-items-center mb-4"> 
    <div> 
 
        <h3 class="fw-bold"> Monitor de Mercado </h3> 
 
        <p class="text-muted"> Acompanhe as cotações de câmbio e criptomoedas. </p> 
    </div> 

    <form 
        action="{{ route('assets.sync') }}" method="POST"> 
 
        @csrf 
 
        <button 
            class="btn btn-outline-cyan" type="submit"> 
            <i class="bi bi-arrow-repeat"></i> Sincronizar API 
        </button> 
 
    </form>  
</div> 
 
<div class="row g-3 mb-4"> 
 
    <div class="col-md-4"> 
 
        <div class="card card-custom p-3"> 
 
            <span class="text-muted"> MAIOR ALTA </span> 
 
            <h4> {{ $topGainer->name ?? 'N/A' }} </h4> 
 
            <span class="text-up"> +{{ number_format
                ( $topGainer->variation_24h ?? 0, 2, ',', '.' ) }}%
            </span> 
        </div> 
    </div> 
 
    <div class="col-md-4"> 
 
        <div class="card card-custom p-3"> 
 
            <span class="text-muted"> MAIOR BAIXA </span> 
 
            <h4> {{ $topLoser->name ?? 'N/A' }} </h4> 
 
            <span class="text-down"> {{ number_format
                ( $topLoser->variation_24h ?? 0, 2, ',', '.' ) }}% 
            </span>  
        </div> 
    </div> 
 
    <div class="col-md-4"> 
 
        <div class="card card-custom p-3"> 
 
            <span class="text-muted"> SEUS ALERTAS ATIVOS </span> 
 
            <h4 class="text-gold"> {{ $activeAlertsCount }} </h4> 
        </div> 
    </div> 
</div> 
 
<div class="card card-custom p-3 mb-4"> 
 
    <form method="GET" action="{{ route('assets.index') }}" class="row g-2"> 
 
        <div class="col-md-6"> 
 
            <input type="text" name="search" value="{{ request('search') }}" 
            class="form-control" placeholder="Pesquisar ativo..." >  
        </div> 
 
        <div class="col-md-4"> 
 
            <select name="type" class="form-select"> 
 
                <option value=""> Todos os tipos </option> 

                <option value="fiat"
                    @selected(request('type') === 'fiat')> Moedas fiduciárias </option> 
 
                <option value="crypto" @selected(request('type') === 'crypto')> Criptomoedas </option> 
            </select> 
        </div> 
 
        <div class="col-md-2"> 
 
            <button type="submit" class="btn btn-cyan w-100" > Filtrar </button> 
        </div> 
    </form> 
</div> 
 
<div class="card card-custom overflow-hidden"> 
 
    <div class="table-responsive"> 
 
        <table class="table table-dark-custom align-middle mb-0"> 
 
            <thead> 
 
                <tr> 
                    <th>Ativo</th> 
                    <th>Tipo</th> 
                    <th>Cotação</th> 
                    <th>Máxima</th> 
                    <th>Mínima</th> 
                    <th>Variação</th> 
                    <th></th> 
                </tr> 
            </thead> 

            <tbody> 
 
                @forelse($assets as $asset) 
 
                    <tr> 
                        <td> 
                            <strong> {{ $asset->symbol }} {{ $asset->name }} </strong> 
 
                            <br> 
 
                            <small class="text-muted"> {{ $asset->code }} </small> 
                        </td> 
 
                        <td> {{ $asset->type }} </td> 
 
                        <td> R$ {{ number_format( $asset->current_price, 4, ',', '.' ) }} </td> 
 
                        <td> R$ {{ number_format( $asset->high_price, 4, ',', '.' ) }} </td> 
 
                        <td> R$ {{ number_format( $asset->low_price, 4, ',', '.' ) }} </td> 
 
                        <td> 
 
                            @if($asset->variation_24h >= 0) 
 
                                <span class="text-up"> +{{ $asset->variation_24h }}% </span> 
 
                            @else 
 
                                <span class="text-down"> {{ $asset->variation_24h }}% </span> 
 
                            @endif 
  
                        </td> 
 
                        <td> 
 
                            <a href="{{ route( 'assets.show', $asset ) }}" 
                            class="btn btn-outline-cyan btn-sm" > Histórico </a> 
                        </td> 
                    </tr> 
 
                @empty 
 
                    <tr> 
                        <td colspan="7" class="text-center py-5" > Nenhum ativo encontrado. </td> 
                    </tr> 
 
                @endforelse 
 
            </tbody> 
        </table> 
    </div> 
</div> 

@endsection
