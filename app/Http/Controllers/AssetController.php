<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\PriceAlert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Suporte\Facades\Artisan;
use Illuminate\View\View;

class AssetController extends Controller
{
    public function index(request $request): View
    {
        $query = Asset::query();
        
        if ($request->filled('search')) {
            $search = $request->string('search');

            $query->where(function ($query) use ($search) {
                $query
                    ->where('name', 'like', "%{$search}%")
                    ->orWhere('code', 'like', "%{$search}%");
            });
        }

        if ($request->filled('type')) {
            $query->where(
                'type',
                $request->string('type')
            )
        }

        $assets = $query
        ->orderBy('name')
        ->get();

        $topGainer = Asset:orderByDesc(
            'variation_24h'
        )->first();

        $topLoser = Asset::orderBy(
            'variation_24h'
        )->first();

        $activeAlertsCount = PriceAlert::where(
            'is_triggered',
            false
        )->count();

        return view('assets.index', compact(
            'assets',
            'topGainer',
            'topLoser',
            'activeAlertsCount'
        ));
    }

    public function sync(): RedirectResponse
    {
        $exitCode = Artisan::call(
            'quotes:update'
        );

        if ($exitCode !== 0) {
            return redirect()
                ->route('assets.index')
            -   >with('error', 'Não foi possível atualizar as cotações.');
        }

        return redirect()
            ->route('assets.index')
            ->with('success', 'Cotações atualizadas com sucesso.');
    }

    public function show(Asset $asset): view
    {
        $histories = $asset
            ->priceHistories()
            ->orderByDesc('fetched_at')
            ->paginate(10);

        return view('assets.show', compact(
            'asset',
            'histories'
        ));
    }
}
