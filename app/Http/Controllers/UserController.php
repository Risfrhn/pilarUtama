<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\landingModel as ModalData;

class UserController extends Controller
{
    public function showLandingPageUser()
    {
        $modalData = ModalData::all(); // Ambil data pertama yang ada (ID 1)
        return view('User.Landing.landingPage', compact('modalData'));
    }
}
