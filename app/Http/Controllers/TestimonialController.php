<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    /**
     * Store a new testimonial
     */
    public function store(Request $request)
    {
        $request->validate([
            'saran_masukan' => 'required|string|max:500|min:10'
        ]);

        Testimonial::create([
            'id_user' => Auth::id(),
            'saran_masukan' => $request->saran_masukan
        ]);

        return back()->with('success', 'Terima kasih atas testimonial Anda!');
    }
}