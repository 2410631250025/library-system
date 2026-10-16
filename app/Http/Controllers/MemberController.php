<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index() 
    {
        $members = Member::all();

        return view('members.index', compact('members'));
    }

    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'nullable|numeric|digits_between:10,15',
        ]); 

        Member::create($validated);

        return redirect()
            ->route('members.index')
            ->with('success', 'Data Anggota Berhasil Ditambahkan.');
    }

    public function edit(Member $member)
    {
    return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
    $member->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
    ]);
    return redirect()->route('members.index')
        ->with('success', 'Data Anggota Berhasil Diperbarui.');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index');
    }
}
