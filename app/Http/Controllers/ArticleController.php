<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')->get();
        return view('articles.index', compact('articles'));
    }
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create', compact('categories', 'tags'));
    }
    public function home(Request $request)
    {
        $categories = Category::all();
        $articles = Article::when($request->category_id, function ($query) use ($request) {
            return $query->where('category_id', $request->category_id);
        })->get();

        return view('home', compact('articles', 'categories'));
    }

    public function show(Article $article)
    {
        $tags = $article->tags;
        return view('articles.article-page', compact('article', 'tags'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'full_text' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $data = $request->only(['title', 'full_text', 'category_id']);
        $data['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('public/articles');
        }

        $article = Article::create($data);

        // Sinkronisasi tags
        if ($request->filled('tags')) {
            $article->tags()->sync($request->tags);
        }

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.edit', compact('article', 'categories', 'tags'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'full_text' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $data = $request->only(['title', 'full_text', 'category_id']);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles');
        }

        $article->update($data);

        // Sinkronisasi tags
        if ($request->filled('tags')) {
            $article->tags()->sync($request->tags);
        } else {
            $article->tags()->detach(); // Hapus semua tag jika kosong
        }

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }


    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::delete($article->image);
        }

        $article->tags()->detach();
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
