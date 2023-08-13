<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Location;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class LocationRepository implements LocationRepositoryInterface
{
    protected $location;

    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    public function withinRadius(float $latitude, float $longitude, float $radius)
    {
        $validator = Validator::make([
            'latitude' => $latitude,
            'longitude' => $longitude,
            'radius' => $radius,
        ], [
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return Location::select(DB::raw("*,
            ( 6371 * acos( cos( radians(?) ) *
            cos( radians( latitude ) )
            * cos( radians( longitude ) - radians(?)
            ) + sin( radians(?) ) *
            sin( radians( latitude ) ) )
            ) AS distance"))
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->setBindings([$latitude, $longitude, $latitude])
            ->get();
    }
}
