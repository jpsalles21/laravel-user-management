<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class UserController extends Controller
{
    public function index()
    {
        try {
            $response = $this->fetchData('?limit=60');

            if ($response->successful()) {
                $users = $response->json()['users'] ?? [];
                $states = $this->getUniqueStates($users);
                $selectedState = request('state');
                $sortedUsers = $this->filterAndSortUsers($users, $selectedState);

                return view('user-list', compact('sortedUsers', 'states', 'selectedState'));
            }

            return response()->json(['error' => 'Erro ao buscar usuarios.'], $response->status());
        } catch (RequestException $e) {
            return response()->json(['error' => 'Erro ao buscar na API: ' . $e->getMessage()], 500);
        }
    }


    private function fetchData($query = '')
    {
        $url = 'https://dummyjson.com/users' . $query;
        return Http::get($url);
    }

    private function getUniqueStates($users)
    {
        $states = [];
        foreach ($users as $user) {
            $state = $user['address']['state'];
            if (!in_array($state, $states)) {
                $states[] = $state;
            }
        }
        sort($states);

        return $states;
    }

    private function filterAndSortUsers($users, $selectedState)
    {
        if ($selectedState) {
            $filteredUsers = array_filter($users, function ($user) use ($selectedState) {
                return $user['address']['state'] === $selectedState;
            });
        } else {
            $filteredUsers = $users;
        }

        usort($filteredUsers, function ($a, $b) {
            if ($a['address']['state'] === $b['address']['state']) {
                return strcmp($a['firstName'], $b['firstName']);
            }
            return strcmp($a['address']['state'], $b['address']['state']);
        });

        return $filteredUsers;
    }

    public function userDetail($id)
    {
        try {
            $response = $this->fetchData('/' . $id);

            if ($response->successful()) {
                $user = $response->json();
                return view('user-detail', compact('user'));
            }

            return response()->json(['error' => 'Usuario nao encontrado.'], 404);
        } catch (RequestException $e) {
            return response()->json(['error' => 'Erro ao buscar na API ' . $e->getMessage()], 500);
        }
    }
}
