<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Repositories\LocationRepositoryInterface;
use App\Models\Location;


class LocationControllerTest extends TestCase
{

public function testGetLocationsWithinRadius()
{
     // Create locations
    $locations = Location::factory()->count(1)->create();
    $latitude = $locations->first()->latitude;
    $longitude = $locations->first()->longitude;
    $radius = 10;

    // Call method
    $response = $this->get('/api/locationswithinradius?latitude='.(string)$latitude.'&longitude='.(string)$longitude.'&radius='.(string)$radius);
    $response->assertStatus(200);
    $response->assertHeader('Content-Type', 'application/json');
    $response->assertJson([]);
}

public function testGetLocationsWithinRadiusValidation()
{
    // Set invalid parameter
    $latitude = "invalid";
    $longitude = "invalid";
    $radius = "invalid";

    // Call method
    $response = $this->get('/api/locationswithinradius?latitude='.$latitude.'&longitude='.$longitude.'&radius='.$radius);
    $response->assertStatus(422);
    $response->assertHeader('Content-Type', 'application/json');
    $response->assertJsonValidationErrors(['latitude', 'longitude', 'radius']);
}
}
