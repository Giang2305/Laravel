<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function sendMessage(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'comment' => 'required'
        ]);

        Contact::create($validatedData);

        return redirect()->back()->with('message', 'Lời nhắn của bạn đã được gửi thành công!');
    }


    public function all_contact()
    {
        $all_contact = DB::table('contacts')->paginate(10);

        return view('admin.contacts.show_contact', compact('all_contact'));
    }

    public function show_contact($id)
    {
        $contact = DB::table('contacts')->where('id', $id)->first();
        if (!$contact) {
            return redirect()->route('all_contact')->with('error', 'Contact not found.');
        }

        return view('admin.contacts.detail_contact', compact('contact'));
    }

    public function delete_contact($id)
    {
        DB::table('contacts')->where('id', $id)->delete();

        return redirect()->route('all_contact')->with('success', 'Contact deleted successfully.');
    }
}
