<?php

namespace App\Http\Controllers;

class LanguageController extends Controller
{
    /**
     * @param $lang
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function swap($lang)
    {
        // Save language in session
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
