<?php

namespace Tests\Unit\Repositories;

use App\Models\Location;
use App\Repositories\LocationRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LocationRepositoryTest extends TestCase
{

    /** @test */
    public function it_can_retrieve_locations_within_radius()
    {
        // Create locations
        $locations = Location::factory()->count(3)->create();
        $latitude = $locations->first()->latitude;
        $longitude = $locations->first()->longitude;
        $radius = 100;
    
        $repository = new LocationRepository(new Location());

        // Call  method
        $result = $repository->withinRadius($latitude, $longitude, $radius);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $result);

    }
    
}