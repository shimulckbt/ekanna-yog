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

        if ($images) {
            $size = $request->file('image')->getSize();
            if ($size <= 5000000) {
                $name_gen = hexdec(uniqid()) . '.' . $images->getClientOriginalExtension();
                $last_img = 'images/about/' . $name_gen;
                Image::make($images)->resize(600, 400)->save($last_img); // With Image Intervention

                $abouts = new About();
                $abouts->title = $request->title;
                $abouts->yt_link = $request->yt_link;
                $abouts->description = $request->description;
                $abouts->image = $last_img;
                $abouts->save();

                return Redirect()->route('about.all')->with('success', 'About content Inserted Successfully');
            } else {
                return Redirect()->route('about.all')->with('error', 'Image is greater than 5 MB');
            }
        } elseif (empty($images)) {
            $abouts = new About();
            $abouts->title = $request->title;
            $abouts->yt_link = $request->yt_link;
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
        $old_image = About::find($id)->image;
        $images = $request->file('image');

        if ($images) {
            $size = $request->file('image')->getSize();
            if (empty($old_image)) {
                if ($size <= 5000000) {
                    $name_gen = hexdec(uniqid()) . '.' . $images->getClientOriginalExtension();
                    $last_img = 'images/about/' . $name_gen;
                    Image::make($images)->resize(600, 400)->save($last_img); // With Image Intervention

                    $abouts = About::findOrFail($id);
                    $abouts->title = $request->title;
                    $abouts->yt_link = $request->yt_link;
                    $abouts->description = $request->description;
                    $abouts->image = $last_img;
                    $abouts->update();

                    return Redirect()->route('about.all')->with('success', 'About content Updated Successfully');
                } else {
                    return Redirect()->route('about.all')->with('error', 'Image is greater than 5 MB');
                }
            } else {
                if ($size <= 5000000) {
                    unlink($old_image);
                    $name_gen = hexdec(uniqid()) . '.' . $images->getClientOriginalExtension();
                    $last_img = 'images/about/' . $name_gen;
                    Image::make($images)->resize(600, 400)->save($last_img); // With Image Intervention

                    $abouts = About::findOrFail($id);
                    $abouts->title = $request->title;
                    $abouts->yt_link = $request->yt_link;
                    $abouts->description = $request->description;
                    $abouts->image = $last_img;
                    $abouts->update();

                    return Redirect()->route('about.all')->with('success', 'About content Updated Successfully');
                } else {
                    return Redirect()->route('about.all')->with('error', 'Image is greater than 5 MB');
                }
            }
        } else {
            $abouts = About::findOrFail($id);
            $abouts->title = $request->title;
            $abouts->yt_link = $request->yt_link;
            $abouts->description = $request->description;
            $abouts->update();
            // dd($abouts);

            return Redirect()->route('about.all')->with('success', 'About content Updated Successfully');
        }
    }

    public function aboutDelete($id)
    {
        $old_image = About::find($id)->image;
        if (empty($old_image)) {
            About::find($id)->delete();
            return Redirect()->back()->with('success', 'Content Deleted Successfully');
        } else {
            unlink($old_image);
            About::find($id)->delete();
            return Redirect()->back()->with('success', 'Content Deleted Successfully');
        }
    }
}
