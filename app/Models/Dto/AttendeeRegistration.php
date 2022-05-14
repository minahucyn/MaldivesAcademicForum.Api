<?php

namespace App\Models\Dto;
use App\Models\Attendee;
use App\Models\Registrations;
use App\Models\EducationLevels;
use App\Models\Conferences;


class AttendeeRegistration
{
    function __construct(Attendee $attendee, Registrations $registration,
        EducationLevels $educationLevels,
        Conferences $conferences ) {

        $this->SetApplicationStatus($registration->IsApproved);
        $this->AttendeeId= $attendee->Id;
        $this->Fullname= $attendee->Fullname;
        $this->NidPp= $attendee->NidPp;
        $this->Birthdate= $attendee->Birthdate;
        $this->ContactNumber= $attendee->ContactNumber;
        $this->Email= $attendee->Email;
        $this->EducationId= $attendee->EducationId;
        
        $this->RegistrationId= $registration->Id;
        $this->ConferenceId= $registration->ConferenceId;
        $this->RegistrationId= $registration->Id;

        $this->EducationLevel= $educationLevels->Description;
        $this->ConferenceName= $conferences->Description;
    }

    public int $AttendeeId;
    public string $Fullname;
    public string $NidPp;
    public string $Birthdate;
    public string $ContactNumber;
    public string $Email;
    public int $EducationId;
    public int $RegistrationId;
    public int $ConferenceId;
    public string $ApplicatonStatus;

    public string $EducationLevel;
    public string $ConferenceName;

    private function SetApplicationStatus(int $isapproved){
        switch ($isapproved) {
            case -1:
                $this->ApplicatonStatus= 'REJECTED';
              break;
            case 0:
                $this->ApplicatonStatus= 'PENDING';
              break;
            case 1:
                $this->ApplicatonStatus= 'APPROVED';
              break;
            default:
                $this->ApplicatonStatus= 'INVALID, PLEASE CONTACT THE INSTITUTION';
          }
    }
}
