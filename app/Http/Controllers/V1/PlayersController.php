<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Players;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function Players(Request $request) {
        $fields = $this->validate($request, [
            'search' => 'nullable|string',
            'page' => 'nullable|integer',
            'order' => 'nullable|order'
        ]);

        $name = $fields['search'] ?? '';

        $order = $fields['order'] ?? 'asc';
        
        $users = Players::where('name', 'like', '%'.$name.'%')->orderBy('name', $order)->paginate(
            $perPage = 10, $columns = [
                'firstName',
                'lastName',
                'name',
                'position',
                'positionFull',
                'rating',
                'nation',
                'club',
                'id_api',
                'stat_pac',
                'stat_sho',
                'stat_pas',
                'stat_dri',
                'stat_def',
                'stat_phy',
            ]
        );
        
        return $users;
    }

    public function Team(Request $request) {
        $fields = $this->validate($request, [
            'name' => 'required|string',
            'page' => 'nullable|integer'
        ]);

        
        
        $users = Players::where('club', 'like', '%'.$fields['name'].'%')->paginate(
            $perPage = 10, $columns = [
                'firstName',
                'lastName',
                'name',
                'position',
                'positionFull',
                'rating',
                'nation',
                'club',
                'id_api',
                'stat_pac',
                'stat_sho',
                'stat_pas',
                'stat_dri',
                'stat_def',
                'stat_phy',
            ]
        );
        
        return $users;
    }

}
