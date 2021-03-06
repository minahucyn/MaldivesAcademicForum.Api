<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Conferences;
use App\Models\EducationLevels;
use App\Models\Attendee;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $conference1 = new Conferences;
        $conference1->Id = 1;
        $conference1->Description = 'Conference 1';
        $conference1->Venue = 'MNU';
        $conference1->RegistrationStartDate = date('Y-m-d');
        $conference1->RegistrationEndDate = date('Y-m-d');
        $conference1->StartDate = date('Y-m-d');
        $conference1->EndDate = date('Y-m-d');
        $conference1->save();

        $education = new EducationLevels;
        $education->Id = 1;
        $education->Description = 'Diploma';
        $education->save();

        $attendee = new Attendee;
        $attendee->Id = 1;
        $attendee->Fullname = 'Mina';
        $attendee->NidPp = 'A309252';
        $attendee->ContactNo = '+9605457485';
        $attendee->Email = 'mina@nis.com';
        $attendee->EducationId = 1;

    }
}
