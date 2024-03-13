<?php

namespace App\Http\Controllers;

use App\Http\Requests\BandApiStoreRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BandController extends Controller
{

    public function getAll()
    {
        return response()->json($this->getBands());
    }


    public function getById($id)
    {
        $band = collect($this->getBands())->first(function ($band) use ($id) {
            return $band->id == $id;
        });

        return $band ? response()->json($band) : abort(404);
    }


    public function getBandsByGender($gender)
    {
        $bands = collect($this->getBands())->filter(function ($band) use ($gender) {
            return $band->gender == $gender;
        });

        return response()->json($bands);
    }


    public function store(BandApiStoreRequest $request)
    {
        return response()->json($request->all());
    }

    protected function getBands(): array
    {

        return [
            [
                'id' => 1, 'name' => 'dream teather', 'gender' => 'progressivo'
            ],
            [
                'id' => 2, 'name' => 'megadeth', 'gender' => 'trash metal'
            ],
            [
                'id' => 3, 'name' => 'dio', 'gender' => 'heavy metal'
            ],
            [
                'id' => 4, 'name' => 'metallica', 'gender' => 'heavy metal'
            ],
            [
                'id' => 5, 'name' => 'barões da pisadinha', 'gender' => 'tecno forró'
            ],

        ];
    }
}
