<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = \App\Models\Appointment::class;
    public function definition()
    {
        return [
            'patient_id' => 2,
            'reason' => $this->faker->sentence(),
            'appointment_date' => $this->faker->date(),
            'appointment_time' => $this->faker->time(),
            'status' =>  $this->faker->randomElement(['Confirmed','Reschedule','Waiting']),     
           
        ];
    }
}
