<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\User;
use Illuminate\Http\Request;

class CongesController extends Controller
{
    public function index() {
        $conges = Conge::with('users')->paginate(3);
        return view('conges.index', compact('conges'));
    }

    // create
    public function create() {
        $users = User::all();
        return view('conges.create', compact('users'));
    }

    // store
    public function store(Request $request) {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);
    
        // Create a new conge
        $conge = Conge::create([
            'date_debut' => $validatedData['date_debut'],
            'date_fin' => $validatedData['date_fin'],
        ]);
    
        // Attach users to the conge
        if (isset($validatedData['user_id'])) {
            $conge->users()->attach($validatedData['user_id']);
        }
    
        return to_route('conges.index')->with('success', 'Conges added successfully');
    }
       
}
