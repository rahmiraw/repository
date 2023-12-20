<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repositories = Repository::all();
        $data = [
            'repositories' => $repositories
        ];
        
        return view('repository.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('repository.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "author" => ['required'],
            "title" => ['required'],
            "year" => ['required', 'numeric', 'min:2021', 'max:2025'],
            "description" => ['required'],
        ]);

        $new = Repository::create($request->all());
        return redirect()->route('repository.index')->with('success', $new->title . " berhasil ditambahkan");
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
        $repository = Repository::find($id);
        return view('repository.edit', compact('repository'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "author" => ['required'],
            "title" => ['required'],
            "year" => ['required', 'numeric', 'min:2021', 'max:2025'],
            "description" => ['required'],
        ]);

        $repository = Repository::find($id);

        $repository->title = $request->input('title');
        $repository->author = $request->input('author');
        $repository->year = $request->input('year');
        $repository->description = $request->input('description');
        $repository->save();

        return redirect()->route('repository.index')->with('success', 'Data repository berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $repository = Repository::find($id);

        if ($repository) {
            $repository->delete();
            return redirect()->route('repository.index')->with('success', 'Data repository berhasil dihapus.');
        } else {
            return redirect()->route('repository.index')->with('error', 'Data repository tidak ditemukan.');
        }
    }
}
