<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function footerShow()
    {
        $footers = Footer::latest()->paginate(5);
        return view('admin.footer.all', compact('footers'));
    }

    public function footerAdd()
    {
        // dd($request);
        return view('admin.footer.add');
    }

    public function footerStore(Request $request)
    {
        $footers = new Footer();
        $footers->facebook = $request->facebook;
        $footers->youtube = $request->youtube;
        $footers->instagram = $request->instagram;
        $footers->save();

        return Redirect()->route('footer.all')->with('success', 'footer Inserted Successfully');
    }

    public function footerEdit($id)
    {
        $footers = Footer::findOrFail($id);
        return view('admin.footer.edit', compact('footers'));
    }

    public function footerUpdate(Request $request, $id)
    {
        $footers = Footer::findOrFail($id);
        $footers->facebook = $request->facebook;
        $footers->youtube = $request->youtube;
        $footers->instagram = $request->instagram;
        $footers->update();

        return Redirect()->route('footer.all')->with('success', 'footer Updated Successfully');
    }

    public function footerDelete($id)
    {
        Footer::find($id)->delete();
        return Redirect()->back()->with('success', 'footer Deleted Successfully');
    }
}
