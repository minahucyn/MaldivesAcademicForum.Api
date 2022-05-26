<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EducationLevels;
use App\Models\Conferences;
use App\Models\Attendees;
use App\Models\Faqs;
use App\Models\Registrations;
use App\Models\ConferenceImages;
use App\Http\Requests\Landing\RegistrationRequest;
use App\Models\Speakers;
use App\Models\Sponsors;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index()
    {
        $educationIds = EducationLevels::all();
        $conferenceIds = Conferences::orderBy('StartDate', 'desc')->get();
        $sponsors = Sponsors::all();

        return view('index', compact('educationIds', 'conferenceIds', 'sponsors'));
    }

    public function publicRegistration(RegistrationRequest $request)
    {
        //check if attendee with same email and nid exists
        $exists = Attendees::where(
            [
                ['NidPp', '=', $request->get('NidPp')]
            ]
        )->get();

        if (count($exists) > 0) {
            $notification = array(
                'message' => 'Your NID / PP is already registered.',
                'alert-type' => 'error'
            );
            return redirect('/#register')->with($notification);
        }

        //check if attendee exists
        $existingAttendee = Attendees::where('Email', $request->get('Email'))->get();
        $conference = Conferences::find($request->get('ConferenceId'));
        $educationLevel = EducationLevels::find($request->get('EducationId'));

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
            $registration->ConferenceId = $conference->Id;
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
            $attendeeId = $existingAttendee[0]->Id;
            $existingRegistration = Registrations::where(
                [
                    ['AttendeeId', '=', $existingAttendee[0]->Id],
                    ['ConferenceId', '=', $conference->Id]
                ]
            )->get();

            if (count($existingRegistration) === 1) {
                $notification = array(
                    'message' => 'You are already registered to the conference.',
                    'alert-type' => 'success'
                );
                return redirect('/')->with($notification);
            } else {
                //create registration
                $registration = new Registrations();

                $registration->AttendeeId = $existingAttendee[0]->Id;
                $registration->ConferenceId = $conference->Id;
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

    public function faq()
    {
        $faqs = Faqs::all();
        return view('faq', compact('faqs'));
    }

    public function about()
    {
        $speakers = Speakers::all();
        $sponsors = Sponsors::all();
        $conferences = Conferences::orderBy('RegistrationStartDate', 'desc')->get();
        return view('about', compact('conferences', 'speakers', 'sponsors'));
    }

    public function gallery($id)
    {
        $images = ConferenceImages::where('conference_id', '=', $id)->get();
        return view('gallery', compact('images'));
    }
}
