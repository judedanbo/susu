<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function show()
    {
        $user =  request()->user();
        $user->load('associations.owner');
        return Inertia::render('Dashboard/Show', [
            'associations' => $user->associations->map(function ($association) {
                return [
                    'id' => $association->id,
                    'name' => $association->name,
                    'is_active' => $association->is_active,
                    'imageUrl' => URL('storage/images/' . $association->image_url),
                    'slogan' => $association->slogan,
                    'owner' => $association->owner->only('id', 'name', 'email'),
                ];
            }),
        ]);
    }
}