<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function Players(Request $request) {
        $fields = $this->validate($request, [
            'search' => 'required|string',
            'page' => 'nullable|integer',
            'order' => 'nullable|order'
        ]);
        
        return $fields['order'];
    }

}
