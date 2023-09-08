<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadAssetsController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        if ($request->hasFile('files')) {
            $data = [];
            foreach ($request->file('files') as $file) {
                $fileName = $file->getFilename() . '-' . uniqid();
                $extension = $file->extension();

                $path = date('Y/m');

                $fullPath = $file->storeAs('public/' . $path, $fileName . '.' . $extension);

                $data[] = Storage::url($fullPath);
            }

            return response()->json([
                'data' => $data,
            ]);
        }

        return response()->json([
            'data' => [],
        ]);
    }
}
