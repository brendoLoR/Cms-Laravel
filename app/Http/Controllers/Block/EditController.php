<?php

namespace App\Http\Controllers\Block;

use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke($blockId)
    {
        return view('block.edit', ['blockId' => $blockId]);
    }
}
