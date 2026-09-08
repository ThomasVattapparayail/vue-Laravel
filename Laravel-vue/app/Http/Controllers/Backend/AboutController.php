<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Get About information
     */
    public function index()
    {
        $about = About::first();

        return response()->json([
            'data' => $about
        ]);
    }

    /**
     * Create About information
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',

            'description' => 'nullable|string',

            'programming_languages' => 'nullable|array',
            'programming_languages.*' => 'string|max:100',

            'frameworks' => 'nullable|array',
            'frameworks.*' => 'string|max:100',
        ]);

        
        if (About::exists()) {
            return response()->json([
                'message' => 'About information already exists.'
            ], 409);
        }

        $about = About::create($validated);

        return response()->json([
            'message' => 'About information created successfully.',
            'data' => $about
        ], 201);
    }

    /**
     * Update About information
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',

            'description' => 'nullable|string',

            'programming_languages' => 'nullable|array',
            'programming_languages.*' => 'string|max:100',

            'frameworks' => 'nullable|array',
            'frameworks.*' => 'string|max:100',
        ]);

        $about = About::first();

        if (!$about) {
            return response()->json([
                'message' => 'About information not found.'
            ], 404);
        }

        $about->update($validated);

        return response()->json([
            'message' => 'About information updated successfully.',
            'data' => $about
        ]);
    }

    public function destroy()
    {
        $about = About::first();

        if (!$about) {
            return response()->json([
                'message' => 'About information not found.'
            ], 404);
        }

        $about->delete();

        return response()->json([
            'message' => 'About information deleted successfully.'
        ]);
    }
}