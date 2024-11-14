<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdRequest;
use App\Http\Requests\UpdateAdBudgetRequest;
use App\Http\Requests\UpdateAdRequest;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        return Ad::all();
    }

    public function store(CreateAdRequest $request)
    {
        return response()->json(Ad::create($request->validated()), 201);
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();

        return response()->json(['message' => 'Объявление удалено']);
    }

    public function updateText(UpdateAdRequest $request, Ad $ad)
    {
        $ad->update([
            'text' => $request->validated(),
            'status' => 'pending'
        ]);

        $ad->refreshStatusInThreeMinutes();

        return response()->json(['message' => 'Текст объявления обновлен и статус изменен на "В ожидании"']);
    }

    public function updateBudget(UpdateAdBudgetRequest $request, Ad $ad)
    {
        $ad->update($request->validated());

        return response()->json(['message' => 'Бюджет обновлен']);
    }
}
