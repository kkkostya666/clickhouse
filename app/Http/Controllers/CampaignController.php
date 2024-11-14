<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        return Campaign::with('ads')->get();
    }

    public function store(CreateCampaignRequest $request)
    {
        return response()->json(Campaign::create($request->validated()), 201);
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();

        return response()->json(['message' => 'Кампания удалена']);
    }

    public function updateStatus(UpdateCampaignRequest $request, Campaign $campaign)
    {
        $campaign->update($request->validated());

        return response()->json(['message' => 'Статус кампании обновлен']);
    }
}
