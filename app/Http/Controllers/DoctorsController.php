<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctors;
use App\Models\Videos;
use App\Models\Handprint;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import the Storage facade
use DB;
use Barryvdh\DomPDF\Facade\Pdf;


class DoctorsController extends Controller
{
    public function create()
    {
        return view('doctors.create');
    }
    public function insertdoctors(Request $request)
   {
    $folderPath = public_path('logos');
    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0777, true);
    }

    $idoctor = new Doctors;
    $idoctor->dispensaryname = $request->input('dispensaryname');
    $idoctor->doctorname = $request->input('doctorname');
    $idoctor->degree = $request->input('degree');
    $idoctor->designation = $request->input('designation');
    $idoctor->location = $request->input('location');
    $idoctor->speciality = $request->input('speciality');

    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->getClientOriginalName();
        $request->file('logo')->move($folderPath, $logoPath);
        $idoctor->logo = $logoPath;
    }

    // Retrieve the soid from the users table and assign it to the soid column of the Doctors model
    $soid = Auth::id();
    $idoctor->soid = $soid;

    $idoctor->save();
    return redirect()->route('doctors.show')->with('success', 'Doctor Successfully added');
    }

    public function showdoctors()
    {
        // Retrieve the currently logged-in user's SO ID
        $soid = Auth::id();

        // Retrieve only the doctors created by the logged-in user
        $doctors = Doctors::where('soid', $soid)->get();

        return view('doctors.show', ['doctors' => $doctors]);
    }
    public function destroy(Doctors $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.show');
    }
    public function edit(Doctors $doctor)
    {
        // Retrieve the doctor from the database and pass it to the view
        return view('doctors.edit', ['doctor' => $doctor]);
    }
    
    public function update(Request $request, Doctors $doctor)
    {
            $folderPath = public_path('logos');
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }
        // Update the doctor's details based on the form input
        $doctor->dispensaryname = $request->input('dispensaryname');
        $doctor->doctorname = $request->input('doctorname');
        $doctor->degree = $request->input('degree');
        $doctor->designation = $request->input('designation');
        $doctor->location = $request->input('location');
        $doctor->speciality = $request->input('speciality');

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move($folderPath, $logoPath);
            $doctor->logo = $logoPath;
        }

        

    // Retrieve the soid from the users table and assign it to the soid column of the Doctors model
    $soid = Auth::id();
    $doctor->soid = $soid;
    
    $doctor->save();
    
        // Redirect the user to the show page or any other appropriate page
        return redirect()->route('doctors.show', ['doctor' => $doctor->id]);
    }
    public function link(Doctors $doctor)
    {
        return view ('home', ['doctor' => $doctor]);
    }
    public function upload(Request $request)
{
    $folderPath = public_path('logos');

    //DB::connection()->enableQueryLog();// Store the file in the public/videos/gallery folder
    $video = new Handprint();
    
    if ($request->hasFile('handprintlogo')) {
        $handprintlogoPath = $request->file('handprintlogo')->getClientOriginalName();
        $request->file('handprintlogo')->move($folderPath, $handprintlogoPath);
        $handprintlogo = $request->file('handprintlogo');
        
        // Save the file path or URL to your model or database if needed
        $video->handprintlogo = $handprintlogoPath;
    }

    // Assign the 'drid' value to the 'drid' column of the 'Videos' model
    $video->drid = $request->dr_id; 
    $video->so_id = $request->so_id;
    $video->save();
    // $queries = DB::getQueryLog();// dd($queries);

    // You can perform additional actions here, such as sending notifications or processing the video further
    return redirect()->back()->with('success', 'Certificate uploaded successfully.');
}
    public function downloadCertificate($id)
    {
        $doctor = Doctors::find($id); // Retrieve the doctor

        $data = ['doctor' => $doctor]; // Pass the doctor variable to the view
    
        $pdf = Pdf::loadView('doctor_certificate', $data);
        return $pdf->download('midas_certificate.pdf'); 
    }
}
