<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::post("/submit", function (Request $request) {

    if ($request->image) {
        $fileHash = md5(file_get_contents($request->image->getRealPath()));
        $fileName = $fileHash . '.' . $request->image->extension();
        $filePath = 'uploads/' . $fileName;

        // Check if the file already exists
        if (!Storage::disk('public')->exists($filePath)) {
            $path = $request->image->storeAs('uploads', $fileName, 'public');
        } else {
          
            $path = $filePath;
        }
        $imageUrl = Storage::url($path);

        
    }
    
})->name("submit");
