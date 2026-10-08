<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request\AlertRequest;
use App\Models\Asset;
use App\Models\PriceAlert;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AlertController extends Controller
{
    public function index(): View
    {
        $alerts = auth()
            ->user()
            ->alerts()
            ->with('asset')
            ->latest()
            ->get();

        return view('alerts.index', compact('alerts'));
    }

    public function create(): View
    {
        $assets = Asset::orderBy('name')->get();

        return view('alerts.create', compact('assets'));
    }

    public function store(AlertRequest $request): RedirectResponse
    {
        auth()->user()->alerts()->create($request->validated());

        return redirect()
            ->route('alerts.index')
            ->with('success', 'Alerta criado com sucesso!');
    }

    public function edit(PriceAlert $alert): View
    {
        abort_unless($alert->user_id === auth()->id(), 403);

        $assets = Asset::orderBy('name')->get();

        return view('alerts.edit', compact('alert', 'assets'));
    }

    public function update(AlertRequest $request, PriceAlert $alert): RedirectResponse
    {
        abort_unless($alert->user_id === auth()->id(), 403);

        $alert->update([
            ...$request->validated(),
            'is_triggered' => false,
            'triggered_at' => null,
        ]);

        return redirect()
            ->route('alerts.index')
            ->with('success', 'Alerta atualizado com sucesso!');
    }

    public function destroy(PriceAlert $alert): RedirectResponse
    {
        abort_unless($alert->user_id === auth()->id(), 403);

        $alert->delete();

        return redirect()
            ->route('alerts.index')
            ->with('success', 'Alerta excluído com sucesso!');
    }
}
