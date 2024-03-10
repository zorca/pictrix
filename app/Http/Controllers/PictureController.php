<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Http\Requests\StorePictureRequest;
use App\Http\Requests\UpdatePictureRequest;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePictureRequest $request)
    {
        foreach ($request->file('files') as $file) {
            $picture = Picture::create([
                'name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                'extension' => $file->getClientOriginalExtension(),
            ]);
            Storage::put($picture->slug . '.' . $file->getClientOriginalExtension(), $file->getContent());
        }
        return back()->with(['files' => Picture::query()->get()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Picture $picture)
    {
        //
    }
}
