<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(6);
        return view('Backoffice.tag', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags'
        ]);

        $tag_name = $request->name;

        $cat = Tag::create([
            'name' => $tag_name
        ]);

        return back()->with(['status' => 'Tag created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->get('id');

        $request->validate([
            'name' => 'required|unique:tags,name,' . $id
        ]);

        $tag_name = $request->get('name');

        $tag = Tag::find($id);
        $tag->update(['name' => $tag_name]);
        return back()->with(['status' => 'Tag updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->get('id');
        $tag = Tag::find($id);
        $tag->delete();

        return back()->with(['status' => 'Tag deleted successfully.']);
    }
}
