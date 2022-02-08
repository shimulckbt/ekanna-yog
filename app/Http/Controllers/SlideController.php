<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use Image;

class SlideController extends Controller
{
    public function slideShow()
    {
        $slides = Slide::latest()->paginate(5);
        return view('admin.home.slide.all', compact('slides'));
    }

    public function slideAdd()
    {
        // dd($request);
        return view('admin.home.slide.add');
    }

    public function slideStore(Request $request)
    {
        $images = $request->file('image');

        if ($images) {
            $size = $request->file('image')->getSize();
            if ($size <= 2000000) {
                $name_gen = hexdec(uniqid()) . '.' . $images->getClientOriginalExtension();
                $last_img = 'images/home/slide/' . $name_gen;
                Image::make($images)->resize(600, 400)->save($last_img); // With Image Intervention

                $slides = new Slide();
                $slides->title = $request->title;
                $slides->yt_link = $request->yt_link;
                $slides->description = $request->description;
                $slides->image = $last_img;
                $slides->save();

                return Redirect()->route('slide.all')->with('success', 'home content Inserted Successfully');
            } else {
                return Redirect()->route('slide.all')->with('error', 'Image is greater than 2 MB');
            }
        } elseif (empty($images)) {
            $slides = new Slide();
            $slides->title = $request->title;
            $slides->yt_link = $request->yt_link;
            $slides->description = $request->description;
            $slides->save();

            return Redirect()->route('slide.all')->with('success', 'home content Inserted Successfully');
        }
    }

    public function slideEdit($id)
    {
        $slides = Slide::findOrFail($id);
        return view('admin.home.slide.edit', compact('slides'));
    }

    public function slideUpdate(Request $request, $id)
    {
        $old_image = Slide::find($id)->image;
        $images = $request->file('image');

        if ($images) {
            $size = $request->file('image')->getSize();
            if (empty($old_image)) {
                if ($size <= 5000000) {
                    $name_gen = hexdec(uniqid()) . '.' . $images->getClientOriginalExtension();
                    $last_img = 'images/home/slide/' . $name_gen;
                    Image::make($images)->resize(600, 400)->save($last_img); // With Image Intervention

                    $slides = Slide::findOrFail($id);
                    $slides->title = $request->title;
                    $slides->yt_link = $request->yt_link;
                    $slides->description = $request->description;
                    $slides->image = $last_img;
                    $slides->update();

                    return Redirect()->route('slide.all')->with('success', 'home content Updated Successfully');
                } else {
                    return Redirect()->route('slide.all')->with('error', 'Image is greater than 5 MB');
                }
            } else {
                if ($size <= 5000000) {
                    unlink($old_image);
                    $name_gen = hexdec(uniqid()) . '.' . $images->getClientOriginalExtension();
                    $last_img = 'images/home/slide/' . $name_gen;
                    Image::make($images)->resize(600, 400)->save($last_img); // With Image Intervention

                    $slides = Slide::findOrFail($id);
                    $slides->title = $request->title;
                    $slides->yt_link = $request->yt_link;
                    $slides->description = $request->description;
                    $slides->image = $last_img;
                    $slides->update();

                    return Redirect()->route('slide.all')->with('success', 'home content Updated Successfully');
                } else {
                    return Redirect()->route('slide.all')->with('error', 'Image is greater than 5 MB');
                }
            }
        } else {
            $slides = Slide::findOrFail($id);
            $slides->title = $request->title;
            $slides->yt_link = $request->yt_link;
            $slides->description = $request->description;
            $slides->update();
            // dd($slides);

            return Redirect()->route('slide.all')->with('success', 'home content Updated Successfully');
        }
    }

    public function slideDelete($id)
    {
        $old_image = Slide::find($id)->image;
        if (empty($old_image)) {
            Slide::find($id)->delete();
            return Redirect()->back()->with('success', 'Content Deleted Successfully');
        } else {
            unlink($old_image);
            Slide::find($id)->delete();
            return Redirect()->back()->with('success', 'Content Deleted Successfully');
        }
    }

    ///////     Slide CONTENT CONTROLLING METHOD       /////
}
