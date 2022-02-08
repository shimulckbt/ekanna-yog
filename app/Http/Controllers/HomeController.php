<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeStart;
use Image;

class HomeController extends Controller
{
    ///////     HOME START CONTENT CONTROLLING METHOD       /////

    public function homeStartShow()
    {
        $homestarts = HomeStart::latest()->paginate(5);
        return view('admin.home.start.all', compact('homestarts'));
    }

    public function homeStartAdd()
    {
        // dd($request);
        return view('admin.home.start.add');
    }

    public function homeStartStore(Request $request)
    {
        $images = $request->file('image');

        if ($images) {
            $size = $request->file('image')->getSize();
            if ($size <= 2000000) {
                $name_gen = hexdec(uniqid()) . '.' . $images->getClientOriginalExtension();
                $last_img = 'images/home/' . $name_gen;
                Image::make($images)->resize(600, 400)->save($last_img); // With Image Intervention

                $homestarts = new HomeStart();
                $homestarts->title = $request->title;
                $homestarts->yt_link = $request->yt_link;
                $homestarts->description = $request->description;
                $homestarts->image = $last_img;
                $homestarts->save();

                return Redirect()->route('home-start.all')->with('success', 'home content Inserted Successfully');
            } else {
                return Redirect()->route('home-start.all')->with('error', 'Image is greater than 2 MB');
            }
        } elseif (empty($images)) {
            $homestarts = new HomeStart();
            $homestarts->title = $request->title;
            $homestarts->yt_link = $request->yt_link;
            $homestarts->description = $request->description;
            $homestarts->save();

            return Redirect()->route('home-start.all')->with('success', 'home content Inserted Successfully');
        }
    }

    public function homeStartEdit($id)
    {
        $homestarts = HomeStart::findOrFail($id);
        return view('admin.home.start.edit', compact('homestarts'));
    }

    public function homeStartUpdate(Request $request, $id)
    {
        $old_image = HomeStart::find($id)->image;
        $images = $request->file('image');

        if ($images) {
            $size = $request->file('image')->getSize();
            if (empty($old_image)) {
                if ($size <= 5000000) {
                    $name_gen = hexdec(uniqid()) . '.' . $images->getClientOriginalExtension();
                    $last_img = 'images/home/' . $name_gen;
                    Image::make($images)->resize(600, 400)->save($last_img); // With Image Intervention

                    $homestarts = HomeStart::findOrFail($id);
                    $homestarts->title = $request->title;
                    $homestarts->yt_link = $request->yt_link;
                    $homestarts->description = $request->description;
                    $homestarts->image = $last_img;
                    $homestarts->update();

                    return Redirect()->route('home-start.all')->with('success', 'home content Updated Successfully');
                } else {
                    return Redirect()->route('home-start.all')->with('error', 'Image is greater than 5 MB');
                }
            } else {
                if ($size <= 5000000) {
                    unlink($old_image);
                    $name_gen = hexdec(uniqid()) . '.' . $images->getClientOriginalExtension();
                    $last_img = 'images/home/' . $name_gen;
                    Image::make($images)->resize(600, 400)->save($last_img); // With Image Intervention

                    $homestarts = HomeStart::findOrFail($id);
                    $homestarts->title = $request->title;
                    $homestarts->yt_link = $request->yt_link;
                    $homestarts->description = $request->description;
                    $homestarts->image = $last_img;
                    $homestarts->update();

                    return Redirect()->route('home-start.all')->with('success', 'home content Updated Successfully');
                } else {
                    return Redirect()->route('home-start.all')->with('error', 'Image is greater than 5 MB');
                }
            }
        } else {
            $homestarts = HomeStart::findOrFail($id);
            $homestarts->title = $request->title;
            $homestarts->yt_link = $request->yt_link;
            $homestarts->description = $request->description;
            $homestarts->update();
            // dd($homestarts);

            return Redirect()->route('home-start.all')->with('success', 'home content Updated Successfully');
        }
    }

    public function homeStartDelete($id)
    {
        $old_image = HomeStart::find($id)->image;
        if (empty($old_image)) {
            HomeStart::find($id)->delete();
            return Redirect()->back()->with('success', 'Content Deleted Successfully');
        } else {
            unlink($old_image);
            HomeStart::find($id)->delete();
            return Redirect()->back()->with('success', 'Content Deleted Successfully');
        }
    }

    ///////     HOME START CONTENT CONTROLLING METHOD       /////
}
