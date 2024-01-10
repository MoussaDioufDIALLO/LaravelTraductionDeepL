<?php

namespace App\Http\Controllers;

use Salmanbe\Deepl\Deepl;
use Illuminate\Http\Request;

class DeeplController extends Controller
{
    public function translate(Request $request)
    {
        $deepl = new Deepl(['auth_key' => env('DEEPL_KEY')]);
        $translation = $deepl->get(
            $request->text,
            $request->target_lang,
            $request->source_lang
        );
        return response()->json($translation);
    }
}