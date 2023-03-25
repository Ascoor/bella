<?php

namespace Tests\Feature;

use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class DoctorControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test the index method of the DoctorController.
     *
     * @return void
     */
    public function testIndex()
    {
        // Create two sections
        $sections = Section::factory()->count(2)->create();

        // Create three doctors, each assigned to one of the sections
        $doctors = Doctor::factory()->count(3)->create();
        $doctors->each(function ($doctor, $index) use ($sections) {
            $doctor->section()->associate($sections[$index])->save();
        });

        // Send a GET request to the index method
        $response = $this->actingAs($user)->get(route('doctor.index'));

        // Assert that the response status is 200 OK
        $response->assertStatus(200);

        // Assert that the response view has the correct sections and doctors
        $response->assertViewHas('sections', $sections);
        $response->assertViewHas('doctors', $doctors);
    }
}
