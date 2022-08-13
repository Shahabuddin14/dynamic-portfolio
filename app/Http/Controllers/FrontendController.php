<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Social;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $services = Service::all();
        $about = About::find(1);
        $skills = Skill::all();
        $portfolios = Portfolio::all();
        $socials = Social::all();
        $testimonials = Testimonial::all();
        $partners = Partner::all();
        $blogs = Blog::where('status', 1)->orderBy('id', 'desc')->simplePaginate(6);
        return view('frontend.home.index', [
            'services' => $services,
            'about' => $about,
            'skills' => $skills,
            'portfolios' => $portfolios,
            'socials' => $socials,
            'testimonials' => $testimonials,
            'partners' => $partners,
            'blogs' => $blogs
        ]);
    }

    public function index()
    {
        $about = About::find(1);
        $socials = Social::all();
        return view('frontend.base', [
            'about' => $about,
            'socials' => $socials
        ]);
    }
    public function downloadCV()
    {
        $cv = About::where('id', 1)->firstOrFail();
        $pathToFile = ($cv->cv);
        return response()->download($pathToFile);
    }

    public function saveContacts(Request $request){
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->details = $request->details;
        $contact->save();
        return redirect('/#contact-section')->with('message','Your query is store successfully');
    }

    public function contactList(){
        $contacts = Contact::paginate(15);
        return view('admin.contact', compact('contacts'));
    }
    public function contactListRemove($id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return back();
    }

    public function singlePortfolio($slug){
        $socials = Social::all();
        $about = About::find(1);
        $portfolio = Portfolio::where('slug',$slug)->firstOrfail();
        return view('frontend.portfolio.index',[
            'about' => $about,
            'portfolio' => $portfolio,
            'socials' => $socials
        ]);
    }
    public function singleBlog($slug){
        $about = About::find(1);
        $socials = Social::all();
        $blog = Blog::where('slug',$slug)->firstOrfail();
        return view('frontend.blog.index', [
            'about' => $about,
            'socials' => $socials
        ])->with('blog', $blog);
    }

    public function adminHome()
    {
        $services = Service::all();
        return view('dashboard', [
            'services' => $services
        ]);
    }
}
