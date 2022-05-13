<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendee;
use App\Models\EducationLevels;
use App\Models\Conferences;
use App\Models\Registrations;

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
        //validate passed in Attendee
        $request->validate([
            'Fullname' => 'required|string|max:100',
            'NidPp' => 'required|string|min:3|max:20',
            'Birthdate' => 'date_format:Y-m-d|before:15 years ago',
            'ContactNumber' => 'required|E.164.PhoneNumber|min:7',
            'Email' => 'required|string|email|max:100',
            'EducationId' => 'required|integer',
            'PaymentSlip' => 'required|base64image',
            'ConferenceId' => 'integer|required'
        ],[
            'Fullname.human_name'=> 'Fullname cannot have numbers!',
            'Birthdate.date_format'=>"Bithdate format must be yyyy-MM-dd.",
            'Birthdate.before' => 'You must be atleast 15 years old to register for the conference.',
            'PaymentSlip'=>'Please provide a valid image [png or jpg].',
            'ContactNumber.e.164._phone_number'=> 'The contact number must conform to E.164 standard.'
        ]);
        
        //define a new array with insert data for registration 

        //Insert attendee if not already present on database
        $educationLevels = EducationLevels::find($request['EducationId']);
        if(is_null($educationLevels)){
            return Response([
                'Error Code'=> 'E001',
                'Message'=> 'Invalid education level Id. '
            ],404);
        }

        $attendee = Attendee::where('NidPp', '=', $request['NidPp'])->get();
        $attendeeByEmail = Attendee::where('Email', '=', $request['Email'])->get();
        $conference = Conferences::where('Id','=',$request['ConferenceId'])->get();
        $inserted = null;

        if(count($attendee) == 0){

            if(count($attendeeByEmail) > 0){
                return Response([
                    'Error Code'=> 'E002',
                    'Message'=> 'The email address is already registered for another national ID / Passport.'
                ],409);
            }

            $attendee = new Attendee;
            $attendee->Fullname = $request->Fullname;
            $attendee->NidPp = $request->NidPp;
            $attendee->Birthdate = $request->Birthdate;
            $attendee->ContactNumber = $request->ContactNumber;
            $attendee->Email = $request->Email;
            $attendee->EducationId = $request->EducationId;
            
            $attendee = $attendee->save();
            //AttendeeController::WRITE_TO_DISK($inserted->PaymentSlipName, $request['PaymentSlip']);
        } 

        //check if the registration requested conference exists!
        if(count($conference) == 0){
            return Response([
                'Error Code'=> 'E003',
                'Message'=> 'Cannot find the conference for which the registration is requested.'
            ],404);
        }

        //check for registration of attendee to the specific conference, insert if required.
        $registration = Registrations::where([
            ['AttendeeId','=',$attendee[0]->Id],
            ['ConferenceId','=', $conference[0]->Id]
        ])->get();

        
        if(count($registration) > 0){
            return Response([
                'Error Code'=> 'E004',
                'Message'=> 'A registration request for the conference already exists for this user.'
            ],409);
        }

        //insert a record for user registration request
        $newRegistration =new Registrations;
        $newRegistration->AttendeeId = $attendee[0]->Id;
        $newRegistration->ConferenceId = $conference[0]->Id;
        $newRegistration->save();

        $registration = Registrations::where([
            ['AttendeeId','=',$attendee[0]->Id],
            ['ConferenceId','=', $conference[0]->Id]
        ])->get();

        AttendeeController::WRITE_TO_DISK($registration[0]->PaymentSlipName, $request['PaymentSlip']);

        return Response([
            $attendee,$registration
        ]);
        

        //Save slip to a resource folder
        //return saved record
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


    public static function WRITE_TO_DISK($filename, $content)
    {
        $fp = fopen($filename.'.txt', 'w');
        fwrite($fp, $content);
        fclose($fp);
    }
}