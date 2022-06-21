<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\CampUpdate;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CampController extends Controller
{
    public function campShow()
    {
        $camps = Camp::latest()->paginate(5);
        return view('admin.camp.all', compact('camps'));
    }

    public function campAdd()
    {
        // dd($request);
        return view('admin.camp.add');
    }

    public function campStore(Request $request)
    {

        $request->validate(
            [
                'camp_image' => 'required',
                'blog_image' => 'required',
            ],

        );

        $camp_image = $request->file('camp_image');
        $blog_image = $request->file('blog_image');

        if (($camp_image) && ($blog_image)) {
            $camp_image_size = $request->file('camp_image')->getSize();
            $blog_image_size = $request->file('blog_image')->getSize();
            if (($camp_image_size <= 2000000) && ($blog_image_size <= 2000000)) {
                $name_gen_camp_image = hexdec(uniqid()) . '.' . $camp_image->getClientOriginalExtension();
                $name_gen_blog_image = hexdec(uniqid()) . '.' . $camp_image->getClientOriginalExtension();
                $camp_img_db_path = 'images/camp/' . $name_gen_camp_image;
                $blog_img_db_path = 'images/blog/' . $name_gen_blog_image;
                $camp_img_path = public_path('images/camp/') . $name_gen_camp_image;
                $blog_img_path = public_path('images/blog/') . $name_gen_blog_image;
                Image::make($camp_image)->save($camp_img_path);
                Image::make($blog_image)->save($blog_img_path);

                $camps = new Camp();
                $camps->camp_title = $request->camp_title;
                $camps->location = $request->location;
                $camps->organizer = $request->organizer;
                $camps->member = $request->member;
                $camps->camp_image = $camp_img_db_path;
                $camps->blog_title = $request->blog_title;
                $camps->blog_image = $blog_img_db_path;
                $camps->blog = $request->blog;

                $camps->save();

                return Redirect()->route('camp.all')->with('success', 'Camp Content Inserted Successfully');
            } else {
                return Redirect()->route('camp.all')->with('error', 'Image is greater than 2 MB');
            }
        }
    }

    public function campEdit($id)
    {
        $camps = Camp::findOrFail($id);
        return view('admin.camp.edit', compact('camps'));
    }

    public function campUpdate(Request $request)
    {
        $id = $request->id;
        $old_camp_image = $request->old_camp_image;
        $old_blog_image = $request->old_blog_image;

        $camp_image = $request->file('camp_image');
        $blog_image = $request->file('blog_image');

        if (($camp_image) || ($blog_image)) {
            if ($camp_image) {
                $camp_image_size = $request->file('camp_image')->getSize();
                if ($camp_image_size <= 2000000) {
                    unlink(public_path($old_camp_image));
                    $camp_image = $request->file('camp_image');
                    $name_gen_camp_image = hexdec(uniqid()) . '.' . $camp_image->getClientOriginalExtension();
                    $camp_img_db_path = 'images/camp/' . $name_gen_camp_image;
                    $camp_img_path = public_path('images/camp/') . $name_gen_camp_image;
                    Image::make($camp_image)->save($camp_img_path);

                    $camps = Camp::findOrFail($id);
                    $camps->camp_title = $request->camp_title;
                    $camps->location = $request->location;
                    $camps->organizer = $request->organizer;
                    $camps->member = $request->member;
                    $camps->camp_image = $camp_img_db_path;
                    $camps->blog_title = $request->blog_title;
                    $camps->blog = $request->blog;

                    $camps->update();

                    return Redirect()->route('camp.all')->with('success', 'Camp Content Updated Successfully');
                } else {
                    return Redirect()->route('camp.all')->with('error', 'Image is greater than 2 MB');
                }
                //if only camp image
            } elseif ($blog_image) {
                $blog_image_size = $request->file('blog_image')->getSize();
                if ($blog_image_size <= 2000000) {
                    unlink(public_path($old_blog_image));
                    $blog_image = $request->file('blog_image');
                    $name_gen_blog_image = hexdec(uniqid()) . '.' . $blog_image->getClientOriginalExtension();
                    $blog_img_db_path = 'images/blog/' . $name_gen_blog_image;
                    $blog_img_path = public_path('images/blog/') . $name_gen_blog_image;
                    Image::make($blog_image)->save($blog_img_path);

                    $camps = Camp::findOrFail($id);
                    $camps->camp_title = $request->camp_title;
                    $camps->location = $request->location;
                    $camps->organizer = $request->organizer;
                    $camps->member = $request->member;
                    $camps->blog_title = $request->blog_title;
                    $camps->blog_image = $blog_img_db_path;
                    $camps->blog = $request->blog;

                    $camps->update();

                    return Redirect()->route('camp.all')->with('success', 'Camp Content Updated Successfully');
                } else {
                    return Redirect()->route('camp.all')->with('error', 'Image is greater than 2 MB');
                }
                //if only blog image
            } else if (($camp_image) && ($blog_image)) {
                $camp_image_size = $request->file('camp_image')->getSize();
                $blog_image_size = $request->file('blog_image')->getSize();
                if (($camp_image_size <= 2000000) && ($blog_image_size <= 2000000)) {
                    unlink($old_camp_image);
                    unlink($old_blog_image);
                    $camp_image = $request->file('camp_image');
                    $blog_image = $request->file('blog_image');
                    $name_gen_camp_image = hexdec(uniqid()) . '.' . $camp_image->getClientOriginalExtension();
                    $name_gen_blog_image = hexdec(uniqid()) . '.' . $blog_image->getClientOriginalExtension();
                    $camp_img__db_path = 'images/camp/' . $name_gen_camp_image;
                    $blog_img_db_path = 'images/blog/' . $name_gen_blog_image;
                    $camp_img_path = public_path('images/camp/') . $name_gen_camp_image;
                    $blog_img_path = public_path('images/blog/') . $name_gen_blog_image;
                    Image::make($camp_image)->save($camp_img_path);
                    Image::make($blog_image)->save($blog_img_path);

                    $camps = Camp::findOrFail($id);
                    $camps->camp_title = $request->camp_title;
                    $camps->location = $request->location;
                    $camps->organizer = $request->organizer;
                    $camps->member = $request->member;
                    $camps->camp_image = $camp_img__db_path;
                    $camps->blog_title = $request->blog_title;
                    $camps->blog_image = $blog_img_db_path;
                    $camps->blog = $request->blog;

                    $camps->update();

                    return Redirect()->route('camp.all')->with('success', 'camp content Updated Successfully');
                } else {
                    return Redirect()->route('camp.all')->with('error', 'Image is greater than 5 MB');
                }
            }
            //if request for both image
        } else {
            $camps = Camp::findOrFail($id);
            $camps->camp_title = $request->camp_title;
            $camps->location = $request->location;
            $camps->organizer = $request->organizer;
            $camps->member = $request->member;
            $camps->blog_title = $request->blog_title;
            $camps->blog = $request->blog;

            $camps->update();
            // dd($camps);

            return Redirect()->route('camp.all')->with('success', 'camp content Updated Successfully');
        }
    }

    public function campDelete($id)
    {
        $old_camp_image = Camp::find($id)->camp_image;
        $old_blog_image = Camp::find($id)->blog_image;
        if (empty(($old_camp_image && ($old_blog_image)))) {
            Camp::find($id)->delete();
            return Redirect()->back()->with('success', 'Content Deleted Successfully');
        } else {
            unlink(public_path($old_camp_image));
            unlink(public_path($old_blog_image));
            Camp::find($id)->delete();
            return Redirect()->back()->with('success', 'Content Deleted Successfully');
        }
    }



    /////////       CAMP UPDATE METHODS START        ///////////

    public function campUpdateShow()
    {
        $camp_updates = Camp::latest()->paginate(5);
        return view('admin.camp.update.all', compact('camp_updates'));
    }

    public function campUpdateAdd()
    {
        return view('admin.camp.update.add');
    }

    public function campUpdateStore()
    {
    }

    public function campUpdateEdit()
    {
    }

    public function campUpdateUpdate()
    {
    }

    public function campUpdateDelete()
    {
    }
}
