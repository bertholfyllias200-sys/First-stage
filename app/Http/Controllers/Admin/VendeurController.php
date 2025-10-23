<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VendeurController extends Controller
{
    public function index()
    {
        return view('admin.vendeurs.index', [
            'vendeurs' => User::where('role', 'vendeur')->get(),
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Vendeur supprimé');
    }
}