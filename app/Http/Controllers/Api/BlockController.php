<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Block;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function edit(Block $block): JsonResponse
    {
        return response()->json(['data' => $block->data]);
    }

    public function update(Request $request, Block $block): JsonResponse
    {
        if ($block->update([
            'data' => $request->get('data'),
            'html' => $request->get('html'),
            'css' => $request->get('css'),
        ])) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 419);

    }
}
