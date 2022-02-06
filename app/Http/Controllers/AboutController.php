<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Carbon;
use Image;

class AboutController extends Controller
{
    public function aboutShow()
    {
        $abouts = About::latest()->paginate(5);
        return view('admin.about.about_all', compact('abouts'));
    }

    public function aboutAdd()
    {
        // dd($request);
        return view('admin.about.about_add');
    }

    public function aboutStore(Request $request)
    {
        $images = $request->file('image');
        $size = $request->file('image')->getSize();

        if ($images) {
            if ($size <= 5000000) {
                $name_gen = hexdec(uniqid()) . '.' . $images->getClientOriginalExtension();
                $last_img = 'images/about/' . $name_gen;
                Image::make($images)->resize(600, 400)->save($last_img); // With Image Intervention

                $abouts = new About();
                $abouts->title = $request->title;
                $abouts->description = $request->description;
                $abouts->image = $last_img;
                $abouts->save();

                return Redirect()->route('about.all')->with('success', 'About content Inserted Successfully');
            } else {
                return Redirect()->route('about.all')->with('error', 'Image is greater than 5 MB');
            }
        } else {
            $abouts = new About();
            $abouts->title = $request->title;
            $abouts->description = $request->description;
            $abouts->save();

            return Redirect()->route('about.all')->with('success', 'About content Inserted Successfully');
        }
    }

    public function aboutEdit($id)
    {
        $abouts = About::findOrFail($id);
        return view('admin.about.about_edit', compact('abouts'));
    }

    public function aboutUpdate(Request $request, $id)
    {
        $old_image = $request->old_image;
        $images = $request->file('image');
        $size = $request->file('image')->getSize();

        if ($images) {
            if ($size <= 5000000) {
                unlink($old_image);
                $name_gen = hexdec(uniqid()) . '.' . $images->getClientOriginalExtension();
                $last_img = 'images/about/' . $name_gen;
                Image::make($images)->resize(600, 400)->save($last_img); // With Image Intervention

                $abouts = new About();
                $abouts->title = $request->title;
                $abouts->description = $request->description;
                $abouts->image = $last_img;
                $abouts->find($id)->update();

                return Redirect()->route('about.all')->with('success', 'About content Updated Successfully');
            } else {
                return Redirect()->route('about.all')->with('error', 'Image is greater than 5 MB');
            }
        } else {
            $abouts = new About();
            $abouts->title = $request->title;
            $abouts->description = $request->description;
            $abouts->find($id)->update();

            return Redirect()->route('about.all')->with('success', 'About content Updated Successfully');
        }
    }

    public function aboutDelete()
    {
        return view('admin.about.about_delete');
    }
}
