<?php
// app/Http/Controllers/ContactController.php
namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Global add
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string',
            'email'   => 'required|email',
            'phone'   => 'required|string',
            'message' => 'required|string',
        ]);

        $msg = ContactMessage::create($data);

        return response()->json($msg, 201);
    }

    // Admin index
    public function index()
    {
        return ContactMessage::latest()->get();
    }

    // Admin delete
    public function destroy($id)
    {
        $msg = ContactMessage::findOrFail($id);
        $msg->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
