<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Camp;
use App\Models\Contact;
use App\Models\Footer;
use App\Models\HomeStart;
use App\Models\Slide;
use App\Models\Upcoming;
use App\Models\VideoLink;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function showHome()
    {
        $homeStarts = HomeStart::first();
        $runningWork = Slide::first();
        $upcomingWork = Upcoming::first();
        $videoLink = VideoLink::first();
        $footerLink = Footer::first();

        return view('welcome', compact('homeStarts', 'runningWork', 'upcomingWork', 'videoLink', 'footerLink'));
    }

    public function showCamp()
    {
        $camp = Camp::first();
        return view('camp.index', compact('camp'));
    }

    public function showAbout()
    {
        $about = About::first();
        return view('about', compact('about'));
    }

    public function contactStore(Request $request)
    {
        $contacts = new Contact();
        $contacts->first_name = $request->first_name;
        $contacts->last_name = $request->last_name;
        $contacts->email = $request->email;
        $contacts->phone = $request->phone;
        $contacts->message = $request->message;
        $contacts->save();

        return Redirect()->back()->with('success', 'Message Sent Successfully');
    }
}
