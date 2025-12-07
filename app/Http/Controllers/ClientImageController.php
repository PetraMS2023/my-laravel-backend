<?php

// app/Http/Controllers/ClientImageController.php
namespace App\Http\Controllers;

use App\Models\ClientImage;
use Illuminate\Http\Request;

class ClientImageController extends Controller
{
    // 🟢 Global index
    public function index()
    {
        return ClientImage::all();
        
    }

    // 🟢 Global show
    public function show($id)
    {
        return ClientImage::findOrFail($id);
    }

    // 🔵 Admin store
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required|string',
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store('client_images', 'public');

        $clientImage = ClientImage::create([
            'name'  => $data['name'],
            'image' => $path,
        ]);

        return response()->json($clientImage, 201);
    }

    // 🔵 Admin update
    public function update(Request $request, $id)
    {
        $clientImage = ClientImage::findOrFail($id);

        $data = $request->validate([
            'name'  => 'sometimes|string',
            'image' => 'sometimes|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('client_images', 'public');
            $data['image'] = $path;
        }

        $clientImage->update($data);

        return $clientImage;
    }

    // 🔵 Admin delete
    public function destroy($id)
    {
        $clientImage = ClientImage::findOrFail($id);
        $clientImage->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
