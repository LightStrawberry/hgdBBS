<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VoteController extends Controller
{
    public function vote($id)
    {
        $comment = comment::find($id);
    }
}
