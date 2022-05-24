<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendees;
use App\Models\EducationLevels;
use App\Models\Conferences;
use App\Models\Registrations;
use App\Models\Dto\AttendeeRegistration;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * register a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registration(Request $request)
    {
        $this->ValidateRegistrationRequest($request);

        $educationLevels = EducationLevels::find($request['EducationId']);
        if (is_null($educationLevels)) {
            return Response([
                'Error Code' => 'E001',
                'Message' => 'Invalid education level Id. '
            ], 404);
        }

        $attendee = $this->GetAttendeeByNid($request);
        $attendeeByEmail = Attendees::where('Email', '=', $request['Email'])->get();
        $conference = Conferences::where('Id', '=', $request['ConferenceId'])->get();

        if (count($attendee) == 0) {

            if (count($attendeeByEmail) > 0) {
                return Response([
                    'Error Code' => 'E002',
                    'Message' => 'The email address is already registered for another national ID / Passport.'
                ], 409);
            }

            $attendee = $this->SaveAttendee($request);
        }

        //check if the registration requested conference exists!
        if (count($conference) == 0) {
            return Response([
                'Error Code' => 'E003',
                'Message' => 'Cannot find the conference for which the registration is requested.'
            ], 404);
        }

        $registration = $this->GetRegistrationByConferenceAndAttendee($attendee[0], $conference[0]);

        if (count($registration) > 0) {
            return Response([
                'Error Code' => 'E004',
                'Message' => 'A registration request for the conference already exists for this user.'
            ], 409);
        }

        $registration = $this->SaveRegistration($attendee[0], $conference[0]);

        $this->SavePaymentSlip($registration[0]->PaymentSlipName, $request['PaymentSlip']);

        //return saved record
        $attendeeResgistration = new AttendeeRegistration(
            $attendee[0],
            $registration[0],
            $educationLevels,
            $conference[0]
        );
        return Response()->json($attendeeResgistration);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function SavePaymentSlip($filename, $content)
    {
        $fp = fopen($filename . '.txt', 'w');
        fwrite($fp, $content);
        fclose($fp);
    }

    private function ValidateRegistrationRequest(Request $request)
    {
        $request->validate([
            'Fullname' => 'required|string|max:100',
            'NidPp' => 'required|string|min:3|max:20',
            'Birthdate' => 'date_format:Y-m-d|before:15 years ago',
            'ContactNumber' => 'required|E.164.PhoneNumber|min:7',
            'Email' => 'required|string|email|max:100',
            'EducationId' => 'required|integer',
            'PaymentSlip' => 'required|base64image',
            'ConferenceId' => 'integer|required'
        ], [
            'Fullname.human_name' => 'Fullname cannot have numbers!',
            'Birthdate.date_format' => "Bithdate format must be yyyy-MM-dd.",
            'Birthdate.before' => 'You must be atleast 15 years old to register for the conference.',
            'PaymentSlip.base64image' => 'Please provide a valid image [ png or jpg ].',
            'ContactNumber.e.164._phone_number' => 'The contact number must conform to E.164 standard.'
        ]);
    }

    private function GetAttendeeByNid(Request $request)
    {
        return Attendees::where('NidPp', '=', $request['NidPp'])->get();
    }

    private function SaveAttendee($request)
    {
        $attendee = new Attendees;
        $attendee->Fullname = $request->Fullname;
        $attendee->NidPp = $request->NidPp;
        $attendee->Birthdate = $request->Birthdate;
        $attendee->ContactNumber = $request->ContactNumber;
        $attendee->Email = $request->Email;
        $attendee->EducationId = $request->EducationId;

        $attendee->save();
        return $this->GetAttendeeByNid($request);
    }

    private function SaveRegistration(Attendees $attendee, Conferences $conference)
    {
        $newRegistration = new Registrations;
        $newRegistration->AttendeeId = $attendee->Id;
        $newRegistration->ConferenceId = $conference->Id;
        $newRegistration->save();

        return $this->GetRegistrationByConferenceAndAttendee($attendee, $conference);
    }

    private function GetRegistrationByConferenceAndAttendee(Attendees $attendee, Conferences $conference)
    {
        return Registrations::where([
            ['AttendeeId', '=', $attendee->Id],
            ['ConferenceId', '=', $conference->Id]
        ])->get();
    }
}
