<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index() 
    {
        $members = [
            'Aditya Nugraha',
            'Nazma Adhvika Arafah',
            'Abelia Yustika',
            'Annisa Annastia',
            'Nisa Ainul Hakim',
        ];
        return view('members.index', compact('members'));
    }
}
