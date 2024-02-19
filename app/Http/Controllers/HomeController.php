<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use function Laravel\Prompts\alert;

class HomeController extends Controller
{
    // This method will show our home page
    public function index() {

        $companies = Job::where('status',1)->orderBy('salary','DESC')->take(8)->get();

        $newCategories = Category::where('status',1)->orderBy('name','ASC')->get();

        $featuredJobs = Job::where('status',1)
                        ->orderBy('created_at','DESC')
                        ->with('jobType')
                        ->where('isFeatured',1)->take(6)->get();
        $latestJobs = Job::where('status',1)
                        ->with('jobType')
                        ->orderBy('created_at','DESC')
                        ->take(6)->get();



        return view('front.home',[
            'companies'=>$companies,
            'featuredJobs' => $featuredJobs,
            'latestJobs' => $latestJobs,
            'newCategories' => $newCategories

        ]);
    }
    public function about() {
             return view('front.about');
    }
     public function blogs() {
             return view('front.blogs');
    }
     public function contact() {
             return view('front.contact');
    }


    public function contact_form_mail(Request $request){

       $request->validate([
            'name' =>'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $subject = $request->subject;
        $message = $request->message;

        $mailTo = 'devrakib.io@gmail.com';
        Mail::to($mailTo)->send(new ContactMail($name, $email, $phone, $subject, $message));
        return view('front.contact')->with('success','Message Sent Successfully');
        alert('Message Sent Successfully');


    }

}
