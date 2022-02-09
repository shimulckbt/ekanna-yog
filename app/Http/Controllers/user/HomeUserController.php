<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Footer;
use App\Models\HomeStart;
use App\Models\Slide;
use App\Models\Upcoming;
use App\Models\VideoLink;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function show()
    {
        $homeStarts = HomeStart::find(2);
        $runningWork = Slide::find(4);
        $upcomingWork = Upcoming::find(4);
        $videoLink = VideoLink::find(2);
        $footerLink = Footer::find(3);

        return view('welcome', compact('homeStarts', 'runningWork', 'upcomingWork', 'videoLink', 'footerLink'));
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
