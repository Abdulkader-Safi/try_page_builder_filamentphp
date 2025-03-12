<?php

namespace App\Http\Controllers;

use App\Models\Pages;

class PagesController extends Controller
{
    public function PageIndex()
    {
        $page = Pages::where('is_public', true)->orderBy('order', 'desc')->first();
        return redirect("/{$page->slug}");
    }

    public function Page($slug)
    {
        $page = Pages::where('is_public', true)->where('slug', $slug)->first();
        return view('page', compact('page'));
    }
}
