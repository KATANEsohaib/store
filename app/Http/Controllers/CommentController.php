<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Comment $comment)
    {
        //
        $comments = Comment::all();
        return view('admin.showcomment', compact('comments')); 

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'message' => 'required',
            // Ajoutez d'autres règles de validation au besoin
        ]);
    
        Comment::create([
            'name' => $formFields['name'],
            'email' => $formFields['email'],
            'message' => $formFields['message'],
        ]);
    
        return redirect('/contact')->with('success', 'Commentaire créé avec succès');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
