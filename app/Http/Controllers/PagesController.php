<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EducationLevels;
use App\Models\Conferences;
use App\Models\Attendees;
use App\Models\Registrations;
use App\Http\Requests\Landing\RegistrationRequest;
use Ramsey\Uuid\Uuid;

class PagesController extends Controller
{
    public function index()
    {
        $educationIds = EducationLevels::all();
        $conferenceIds = Conferences::all();

        return view('index', compact('educationIds', 'conferenceIds'));
    }

    public function publicRegistration(RegistrationRequest $request)
    {
        //check if attendee exists
        $existingAttendee = Attendees::where('Email', '=', $request->get('Email'))->get();
        $conference = Conferences::where('Id', '=', $request->get('ConferenceId'))->get();
        $educationLevel = EducationLevels::where('Id', '=', $request->get('EducationId'))->get();

        if (count($existingAttendee) < 1) {

            //create attendee
            $attendee = new Attendees();
            $attendee->Fullname = $request->get('Fullname');
            $attendee->NidPp = $request->get('NidPp');
            $attendee->Birthdate = $request->get('Birthdate');
            $attendee->Email = strtolower($request->get('Email'));
            $attendee->ContactNumber = $request->get('ContactNumber');
            $attendee->EducationId = $request->get('EducationId');
            $attendee->save();

            //create registration
            $registration = new Registrations();

            $registration->AttendeeId = $attendee->Id;
            $registration->ConferenceId = $request->get('ConferenceId');
            $registration->IsApproved = 0;

            $uuid = Uuid::uuid4();
            $file = $request->file('PaymentSlip');
            $file_name = time() . $file->getClientOriginalName();
            $file_path = 'uploads/payment-slips';
            $file->move($file_path, $file_name);
            $registration->PaymentSlipPath =  $file_path . '/' . $file_name;
            $registration->PaymentSlipName =  $uuid;
            $registration->save();

            $notification = array(
                'message' => 'Successfully registered for the conference.',
                'alert-type' => 'success'
            );
            return redirect('/')->with($notification);
        } else {
            $latestAttrendee = Attendees::orderBy('id', 'desc')->limit(1)->get();
            $existingRegistration = Registrations::where(
                [
                    ['AttendeeId', '=', $latestAttrendee->Id],
                    ['ConferenceId', '=', $request->get('ConferenceId')]
                ]
            )->get();

            if (count($existingRegistration) === 1) {
                $notification = array(
                    'message' => 'You are already registered to the conference.',
                    'alert-type' => 'warning'
                );
                return redirect('/')->with($notification);
            } else {
                //create registration
                $registration = new Registrations();

                $registration->AttendeeId = $existingAttendee->Id;
                $registration->ConferenceId = $request->get('ConferenceId');
                $registration->IsApproved = 0;

                $uuid = Uuid::uuid4();
                $file = $request->file('PaymentSlip');
                $file_name = time() . $file->getClientOriginalName();
                $file_path = 'uploads/payment-slips';
                $file->move($file_path, $file_name);
                $registration->PaymentSlipPath =  $file_path . '/' . $file_name;
                $registration->PaymentSlipName =  $uuid;
                $registration->save();

                $notification = array(
                    'message' => 'Successfully registered for the conference.',
                    'alert-type' => 'success'
                );
                return redirect('/')->with($notification);
            }
        }
    }

    public function speakers()
    {
        return view('speakers');
    }

    public function sponsors()
    {
        return view('sponsors');
    }

    public function faq()
    {
        return view('faq');
    }

    public function about()
    {
        return view('about');
    }
}
