<?php

// app/Http/Controllers/ContactNumberController.php
namespace App\Http\Controllers;

use App\Models\ContactNumber;
use Illuminate\Http\Request;

class ContactNumberController extends Controller
{
    // 🟢 Global index
    public function index()
    {
        // نرجّعهم مرتبين حسب position 1..4
        return ContactNumber::orderBy('position')->get();
    }

    // 🟢 Global show
    public function show($id)
    {
        return ContactNumber::findOrFail($id);
    }

    // 🔵 Admin store
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string',
            'number'   => 'required|string',
            'position' => 'required|integer|min:1|max:4|unique:contact_numbers,position',
            
        ]);

        $contactNumber = ContactNumber::create($data);

        return response()->json($contactNumber, 201);
    }

    // 🔵 Admin update
    public function update(Request $request, $id)
    {
        $contactNumber = ContactNumber::findOrFail($id);

        $data = $request->validate([
            'name'     => 'sometimes|string',
            'number'   => 'sometimes|string',
            'position' => 'sometimes|integer|min:1|max:4|unique:contact_numbers,position,' . $contactNumber->id,
        ]);

        $contactNumber->update($data);

        return $contactNumber;
    }

    // 🔵 Admin delete
    public function destroy($id)
    {
        $contactNumber = ContactNumber::findOrFail($id);
        $contactNumber->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
