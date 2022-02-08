<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contactShow()
    {
        $contacts = Contact::latest()->paginate(5);
        return view('admin.contact.all', compact('contacts'));
    }

    public function contactAdd()
    {
        // dd($request);
        return view('admin.contact.add');
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

        return Redirect()->route('contact.all')->with('success', 'Contact Inserted Successfully');
    }

    public function contactEdit($id)
    {
        $contacts = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('contacts'));
    }

    public function contactUpdate(Request $request, $id)
    {
        $contacts = Contact::findOrFail($id);
        $contacts->first_name = $request->first_name;
        $contacts->last_name = $request->last_name;
        $contacts->email = $request->email;
        $contacts->phone = $request->phone;
        $contacts->message = $request->message;
        $contacts->update();

        return Redirect()->route('contact.all')->with('success', 'Contact Updated Successfully');
    }

    public function contactDelete($id)
    {
        Contact::find($id)->delete();
        return Redirect()->back()->with('success', 'Contact Deleted Successfully');
    }
}
