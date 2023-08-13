<?php

namespace App\Repositories;

interface LocationRepositoryInterface
{
    public function withinRadius(float $latitude, float $longitude, float $radius);
}