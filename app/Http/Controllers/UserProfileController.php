<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profile = Profile::where('user_id', Auth::user()->id)->get();
        return view('memberProfile', [
            'profile' => $profile,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'contact' => ['required', 'max:10'],
            'alternate_contact' => ['required', 'max:10'],
            'residence' => ['required'],
            'native' => ['required'],
        ], [
            'contact.required' => 'Contact number required',
            'contact.max' => 'Must be only 10 digits',
            'alternate_contact.required' => 'Alternate contact required',
            'alternate_contact.max' => 'Must be only 10 digits',
            'residence.required' => 'Mention your current address',
            'native.required' => 'Mention your native address',
        ]);

        $fields = $request->all();
        $fields['user_id'] = Auth::id();
        Profile::create($fields);
        // return $fields;
        return redirect()->route('view.show', Auth::id())->with('success', 'Profile Saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
