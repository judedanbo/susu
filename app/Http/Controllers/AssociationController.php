<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssociationRequest;
use App\Http\Requests\UpdateAssociationRequest;
use App\Models\Association;
use Inertia\Inertia;

class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Associations/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssociationRequest $request)
    {
        $user =  request()->user();
        $filePath = $request->file('image_url')->store('public/images');
        if (!$filePath) {
            return response()->json(['error' => 'Image is could not be uploaded'], 422);
        }

        $uploadedFile = $request->file('image_url');

        $user->associations()->create(
            [
                'name' => $request->name,
                'image_url' => $uploadedFile->hashName(),
                'slogan' => $request->slogan,
            ]
        );
        // $association  = Association::create(request()->user(), $request->all());
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Association $association)
    {
        $association->load('owner');
        // return $association;
        return Inertia::render('Associations/Show', [
            'association' => [
                'id' => $association->id,
                'name' => $association->name,
                'is_active' => $association->is_active,
                'imageUrl' => URL('storage/images/' . $association->image_url),
                'slogan' => $association->slogan,
                'owner' => $association->owner->only('id', 'name', 'email'),
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Association $association)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssociationRequest $request, Association $association)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Association $association)
    {
        //
    }
}