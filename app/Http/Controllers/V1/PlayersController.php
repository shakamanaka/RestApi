<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Players;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function Players(Request $request) {
        $fields = $this->validate($request, [
            'search' => 'required|string',
            'page' => 'nullable|integer',
            'order' => 'nullable|order'
        ]);

        // $page = $field['page'] ?? 1;

        $order = $fields['order'] ?? 'asc';
        
        $users = Players::where('name', 'like', '%'.$fields['search'].'%')->orderBy('name', $order)->paginate(
            $perPage = 10, $columns = ['nation','position', 'name', 'lastName', 'firstName']
        );
        
        return $users;
    }

}
