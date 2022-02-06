<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function aboutShow()
    {
        $abouts = About::latest()->get();
        return view('admin.about.about_all', compact('abouts'));
    }
    public function aboutEdit()
    {
        return view('admin.about.about_edit');
    }
    public function aboutUpdate()
    {
        return view('admin.about.about_update');
    }
    public function aboutDelete()
    {
        return view('admin.about.about_delete');
    }
}
