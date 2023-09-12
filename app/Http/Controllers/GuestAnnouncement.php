<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class GuestAnnouncement extends Controller
{
    public function index()
    {
        return view('announcement', [
            "title" => "Announcement",
            "announcements" => Announcement::latest()->get()
        ]);
    }
}
