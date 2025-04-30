<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Store or update a rating
     */
    public function store(Request $request)
    {

        $request->validate([
            'id_galeri' => 'required|exists:galeris,id_galeri',
            'rating' => 'required|integer|between:1,5'
        ]);



        // Check if user already rated this gallery
        $existingRating = Rating::where('id_galeri', $request->id_galeri)
                                ->where('id_user', Auth::id())
                                ->first();

        if ($existingRating) {
            // Update existing rating
            $existingRating->update([
                'rating' => $request->rating
            ]);
            
            $message = 'Rating Anda telah diperbarui!';
        } else {
            // Create new rating
            Rating::create([
                'id_galeri' => $request->id_galeri,
                'id_user' => Auth::id(),
                'rating' => $request->rating
            ]);
            
            $message = 'Terima kasih telah memberikan rating!';
        }

        return back()->with('success', $message);
    }
}