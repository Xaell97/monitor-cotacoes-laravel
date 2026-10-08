@extends('layouts.app') 
 
@section('title', 'Meus Alertas') 
   
@section('content') 
 
<div class="d-flex justify-content-between align-items-center mb-4"> 
    <div> 
        <h3> Meus Alertas </h3> 
        <p class="text-muted"> Gerencie seus alertas de preço. </p> 
    </div> 
    <a href="{{ route('alerts.create') }}" 
    class="btn btn-cyan" > Novo Alerta </a> 
</div> 
<div class="card card-custom overflow-hidden"> 
    <div class="table-responsive"> 
        <table class="table table-dark-custom"> 
            <thead> 
                <tr> 
                    <th>Ativo</th> 
                    <th>Preço alvo</th> 
                    <th>Condição</th> 
                    <th>Status</th> 
                    <th>Disparo</th> 
                    <th>Ações</th> 
                </tr> 
            </thead> 
            <tbody> 
                @forelse($alerts as $alert) 
                    <tr> 
                        <td> {{ $alert->asset->symbol }} 
                            {{ $alert->asset->name }} </td> 
                        <td> R$ {{ number_format
                            ( $alert->target_price, 4, ',', '.' ) }} </td> 
                        <td> 
                            @if($alert->condition === 'above') 
                                Maior ou igual 
                            @else 
                                Menor ou igual 
                            @endif 
                        </td> 
                        <td> 
                            @if($alert->is_triggered) 
                                <span class="badge bg-success"> Disparado </span> 
                            @else 
                                <span class="badge bg-warning text-dark"> Monitorando
                                </span> 
                            @endif 
                        </td> 
                        <td> {{ $alert->triggered_at ? 
                            $alert->triggered_at->format('d/m/Y H:i:s') : '-' }} 
                        </td> 
                        <td> 
                            <a href="{{ route( 'alerts.edit', $alert ) }}" 
                            class="btn btn-outline-cyan btn-sm" > Editar </a> 
                            <form action="{{ route( 'alerts.destroy', $alert ) }}" 
                            method="POST" class="d-inline" > 
                                @csrf 
                                @method('DELETE') 
                                <button type="submit" class="btn btn-outline-danger btn-sm" 
                                onclick="return confirm( 'Excluir este alerta?' )" > Excluir </button> 
                            </form> 
                        </td> 
                    </tr> 
                @empty 
                    <tr> 
                        <td colspan="6" class="text-center py-5" >
                             Você ainda não possui alertas. </td> 
                    </tr> 
                @endforelse 
            </tbody> 
        </table> 
    </div> 
</div> 
@endsection
