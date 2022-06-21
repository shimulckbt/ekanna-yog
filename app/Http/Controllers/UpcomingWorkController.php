<?php

namespace App\Http\Controllers;

use App\Models\Upcoming;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UpcomingWorkController extends Controller
{
    public function upcomingWorkShow()
    {
        $upcomingWorks = Upcoming::latest()->paginate(5);
        return view('admin.home.upcoming.all', compact('upcomingWorks'));
    }

    public function upcomingWorkAdd()
    {
        // dd($request);
        return view('admin.home.upcoming.add');
    }

    public function upcomingWorkStore(Request $request)
    {
        $images = $request->file('image');

        if ($images) {
            $size = $request->file('image')->getSize();
            if ($size <= 2000000) {
                $name_gen = hexdec(uniqid()) . '.' . $images->getClientOriginalExtension();
                $last_img = public_path('images/home/upcoming/') . $name_gen;
                Image::make($images)->save($last_img); // With Image Intervention

                $upcomingWorks = new Upcoming();
                $upcomingWorks->title = $request->title;
                $upcomingWorks->description = $request->description;
                $upcomingWorks->image = $last_img;
                $upcomingWorks->save();

                return Redirect()->route('upcoming-work.all')->with('success', 'home content Inserted Successfully');
            } else {
                return Redirect()->route('upcoming-work.all')->with('error', 'Image is greater than 2 MB');
            }
        } elseif (empty($images)) {
            $upcomingWorks = new Upcoming();
            $upcomingWorks->title = $request->title;
            $upcomingWorks->description = $request->description;
            $upcomingWorks->save();

            return Redirect()->route('upcoming-work.all')->with('success', 'home content Inserted Successfully');
        }
    }

    public function upcomingWorkEdit($id)
    {
        $upcomingWorks = Upcoming::findOrFail($id);
        return view('admin.home.upcoming.edit', compact('upcomingWorks'));
    }

    public function upcomingWorkUpdate(Request $request, $id)
    {
        $old_image = Upcoming::find($id)->image;
        $images = $request->file('image');

        if ($images) {
            $size = $request->file('image')->getSize();
            if (empty($old_image)) {
                if ($size <= 2000000) {
                    $name_gen = hexdec(uniqid()) . '.' . $images->getClientOriginalExtension();
                    $last_img = public_path('images/home/upcoming/') . $name_gen;
                    Image::make($images)->save($last_img); // With Image Intervention

                    $upcomingWorks = Upcoming::findOrFail($id);
                    $upcomingWorks->title = $request->title;
                    $upcomingWorks->description = $request->description;
                    $upcomingWorks->image = $last_img;
                    $upcomingWorks->update();

                    return Redirect()->route('upcoming-work.all')->with('success', 'home content Updated Successfully');
                } else {
                    return Redirect()->route('upcoming-work.all')->with('error', 'Image is greater than 5 MB');
                }
            } else {
                if ($size <= 2000000) {
                    unlink($old_image);
                    $name_gen = hexdec(uniqid()) . '.' . $images->getClientOriginalExtension();
                    $last_img = public_path('images/home/upcoming/') . $name_gen;
                    Image::make($images)->save($last_img); // With Image Intervention

                    $upcomingWorks = Upcoming::findOrFail($id);
                    $upcomingWorks->title = $request->title;

                    $upcomingWorks->description = $request->description;
                    $upcomingWorks->image = $last_img;
                    $upcomingWorks->update();

                    return Redirect()->route('upcoming-work.all')->with('success', 'home content Updated Successfully');
                } else {
                    return Redirect()->route('upcoming-work.all')->with('error', 'Image is greater than 5 MB');
                }
            }
        } else {
            $upcomingWorks = Upcoming::findOrFail($id);
            $upcomingWorks->title = $request->title;
            $upcomingWorks->description = $request->description;
            $upcomingWorks->update();
            // dd($upcomingWorks);

            return Redirect()->route('upcoming-work.all')->with('success', 'home content Updated Successfully');
        }
    }

    public function upcomingWorkDelete($id)
    {
        $old_image = Upcoming::find($id)->image;
        if (empty($old_image)) {
            Upcoming::find($id)->delete();
            return Redirect()->back()->with('success', 'Content Deleted Successfully');
        } else {
            unlink($old_image);
            Upcoming::find($id)->delete();
            return Redirect()->back()->with('success', 'Content Deleted Successfully');
        }
    }
}
