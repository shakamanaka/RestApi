<?php

namespace App\Http\Controllers;

use App\Models\Players;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RestController extends Controller
{
    public function insertDefaultData() {
        $client = new Client([
            'base_uri' => 'https://www.easports.com/fifa/ultimate-team/api/fut/item',
            'http_errors' => false
        ]);
        $response = $client->request('GET','?page=1');
        $data = json_decode($response->getBody(), true);
        $val = $data['totalPages'];
        $rows = [];
        $data = $data['items'];
        foreach ($data as $key) {
            array_push($rows,[
                'firstName' => $key['firstName'],
                'lastName' => $key['lastName'],
                'name' => $key['name'],
                'position' => $key['position'],
                'positionFull' => $key['positionFull'],
                'rating' => $key['rating'],
                'nation' => $key['nation']['name'],
                'club' => $key['club']['name'],
                'id_api' => $key['id'],
                'stat_pac' => $key['attributes'][0]['value'],
                'stat_sho' => $key['attributes'][1]['value'],
                'stat_pas' => $key['attributes'][2]['value'],
                'stat_dri' => $key['attributes'][3]['value'],
                'stat_def' => $key['attributes'][4]['value'],
                'stat_phy' => $key['attributes'][5]['value']
            ]); 
        };
            
        for ($i=2; $i <= $val; $i++) { 
            $response = $client->request('GET','?page='.$i);
            $data = json_decode($response->getBody(), true);
            $data = $data['items'];
            foreach ($data as $key) {
                array_push($rows,[
                    'firstName' => $key['firstName'],
                    'lastName' => $key['lastName'],
                    'name' => $key['name'],
                    'position' => $key['position'],
                    'positionFull' => $key['positionFull'],
                    'rating' => $key['rating'],
                    'nation' => $key['nation']['name'],
                    'club' => $key['club']['name'],
                    'id_api' => $key['id'],
                    'stat_pac' => $key['attributes'][0]['value'],
                    'stat_sho' => $key['attributes'][1]['value'],
                    'stat_pas' => $key['attributes'][2]['value'],
                    'stat_dri' => $key['attributes'][3]['value'],
                    'stat_def' => $key['attributes'][4]['value'],
                    'stat_phy' => $key['attributes'][5]['value']
                ]);
            };
        }        
        Players::insertOrIgnore($rows);
        
    }

    
}
