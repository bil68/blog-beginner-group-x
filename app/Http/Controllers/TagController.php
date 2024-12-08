<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // Tampilkan daftar tags
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    // Form untuk membuat tag baru
    public function create()
    {
        return view('tags.create');
    }

    // Simpan tag baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Tag::create($request->all());

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    // Tampilkan detail tag (optional)
    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }

    // Form untuk mengedit tag
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    // Update tag
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $tag->update($request->all());

        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }

    // Hapus tag
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}
