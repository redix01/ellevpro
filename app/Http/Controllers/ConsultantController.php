<?php

namespace App\Http\Controllers;

use App\Mail\ConsultantMail;
use App\Models\Consultant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConsultantController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'business_email' => 'required|email|unique:contact_submissions,business_email',
            'phone_number' => 'nullable|string|max:20',
            'company_name' => 'nullable|string|max:255',
            'help_topic' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        $data = Consultant::create($validated);
        Mail::to('admin@brixfin.com')->send(new ConsultantMail($data) );
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
