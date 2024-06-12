<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Partner;
use App\Models\Reference;
use App\Models\Team;
use App\Models\About;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Project;
use App\Models\Counter;
use App\Models\ProjectCategory;

class FrontendController extends Controller
{

    public function index(){
        $services = Service::take(6)->get();
        $counter = Counter::get();
        $clients = Partner::get();
        $references = Reference::get();
        $project = Project::take(6)->get();
        return view('front.pages.index',compact('services','counter','clients','references','project'));
    }

    public function about(){
        $about = About::first();
        $counter = Counter::get();
        $services = Service::get();
        return view('front.pages.about',compact('about','counter','services'));
    }

    public function faqs(){
        $faqs = Faq::get();
        return view('front.pages.faq',compact('faqs'));
    }
    
    public function client(){
        $clients = Partner::get();
        return view('front.pages.client',compact('clients'));
    }

    public function reference(){
        $references = Reference::get();
        return view('front.pages.reference',compact('references'));
    }

    public function team(){
        $teams = Team::get();
        return view('front.pages.team',compact('teams'));
    }

    public function projects(){
        $projects = Project::get();
        $category = ProjectCategory::get();
        return view('front.pages.projects',compact('projects','category'));
    }
    public function project_single($slug){
        $project = Project::where('slug->'.app()->getLocale(),$slug)->first();
        return view('front.pages.project_single',compact('project'));
    }

    public function blogs(){
        $blogs = Blog::get();
        return view('front.pages.blogs',compact('blogs'));
    }
    public function blog_single($slug){
        $blog= Blog::where('slug->'.app()->getLocale(),$slug)->first();
        return view('front.pages.blog_single',compact('blog'));
    }
    public function contact(){
        return view('front.pages.contact');
    }
    public function services(){
        $services =  Service::get();
        return view('front.pages.services',compact('services'));
    }
    public function service_single($slug){
        $service = Service::where('slug->'.app()->getLocale(),$slug)->first();
        return view('front.pages.service_single',compact('service'));
    }




public function search(Request $request){
 
    $q = $request->q;
    $service = Service::where('title','like' ,'%'.$q.'%')->first();

    if($service){
        return view('front.pages.service_single',compact('service'));
    }else{
        return redirect()->back()->with('error', __('ERROR!') );
    }

}


    public function contact_send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'phone' => 'required',
        ]);
        $dArr = [
            '{form_name}' => $request->name,
            '{form_email}' => $request->email,
            '{form_message}' => $request->message,
            '{form_phone}' => $request->phone,
        ];
        $resp = Utility::sendEmailTemplate('Contact', 'aga.mustafayevvv@gmail.com', $dArr);
        return redirect()->back()->with('success', __('Page Successfully added!') );

    }


    




    public function subscription(Request $request){
        $subs = new Subscription();
        $subs->email = $request->email;
        $subs->save();

        return redirect()->back()->with('success', __('Successfully Subscription') );
    }

    public function appointment(Request $request){

        $appointment = new Appointment();
        
        $appointment->name = $request->name;
        $appointment->company = $request->company;
        $appointment->employee = $request->employee;
        $appointment->busines = $request->busines;
        $appointment->phone = $request->phone;
        $appointment->desc = $request->desc;
        $appointment->email = $request->email;
        $appointment->save();

        return redirect()->back()->with('success', __('Successfully Sended Message') );
    }





    public function contactForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'name' => 'required',
            'desc' => 'required',

        ]);

        $subscription = new ContactForm();
        $subscription->email      = $request->email;
        $subscription->desc      = $request->desc;
        $subscription->name      = $request->name;
        $subscription->subject      = $request->subject;
        $subscription->save();

        return redirect()->back()->with('success', __('Mesajınız uğurla göndərildi') );
    }

}
