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

        $order = $fields['order'] ?? 'asc';
        
        $users = Players::where('name', 'like', '%'.$fields['search'].'%')->orderBy('name', $order)->paginate(
            $perPage = 10, $columns = ['nation','position', 'name', 'lastName', 'firstName','club']
        );
        
        return $users;
    }

    public function AllPlayers() {
        $users = Players::paginate(
            $perPage = 10, $columns = ['nation','position', 'name', 'lastName', 'firstName','club']
        );
        
        return $users;
    }

    public function Team(Request $request) {
        $fields = $this->validate($request, [
            'name' => 'required|string',
            'page' => 'nullable|integer'
        ]);

        
        
        $users = Players::where('club', 'like', '%'.$fields['name'].'%')->paginate(
            $perPage = 10, $columns = ['nation','position', 'name', 'lastName', 'firstName','club']
        );
        
        return $users;
    }

}
