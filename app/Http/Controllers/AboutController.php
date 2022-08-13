<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function about()
    {
        $about = About::findOrFail(1);
        return view('admin.about.index', compact('about'));
    }
    public function aboutEdit()
    {
        $about = About::findOrFail(1);
        return view('admin.about.edit', compact('about'));
    }

    public function updateAbout(Request $request)
    {
        $about = About::findOrFail(1);
        $image = $request->file('background_image');
        $cv = $request->file('cv');
        $about_image = $request->file('about_image');

        if($image && $cv && $about_image)
        {
            $imageName = $image->getClientOriginalName();
            $directory = 'images/about/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;

            $cvName = $cv->getClientOriginalName();
            $directory = 'images/about/';
            $cv->move($directory, $cvName);
            $cvUrl = $directory.$cvName;
            if ($cv->getClientMimeType() !== 'application/pdf')
            {
                return back()->with('message','You need to upload PDF only');
            }

            $about_imageName = $about_image->getClientOriginalName();
            $directory = 'images/about/';
            $about_image->move($directory, $about_imageName);
            $about_imageUrl = $directory.$about_imageName;

            $about->nick_name = $request->nick_name;
            $about->short_description = $request->short_description;
            $about->background_image = $imageUrl;
            $about->details = $request->details;
            $about->cv = $cvUrl;
            $about->email_address = $request->email_address;
            $about->phone_number = $request->phone_number;
            $about->address = $request->address;
            $about->about_image = $about_imageUrl;
            $about->save();
        }
        elseif ($image && $cv)
        {
            $imageName = $image->getClientOriginalName();
            $directory = 'images/about/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;

            $cvName = $cv->getClientOriginalName();
            $directory = 'images/about/';
            $cv->move($directory, $cvName);
            $cvUrl = $directory.$cvName;
            if ($cv->getClientMimeType() !== 'application/pdf')
            {
                return back()->with('message','You need to upload PDF only');
            }

            $about->nick_name = $request->nick_name;
            $about->short_description = $request->short_description;
            $about->background_image = $imageUrl;
            $about->details = $request->details;
            $about->cv = $cvUrl;
            $about->email_address = $request->email_address;
            $about->phone_number = $request->phone_number;
            $about->address = $request->address;
            $about->save();
        }
        elseif ($image && $about_image)
        {
            $imageName = $image->getClientOriginalName();
            $directory = 'images/about/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;
            $about_imageName = $about_image->getClientOriginalName();
            $directory = 'images/about/';
            $about_image->move($directory, $about_imageName);
            $about_imageUrl = $directory.$about_imageName;

            $about->nick_name = $request->nick_name;
            $about->short_description = $request->short_description;
            $about->background_image = $imageUrl;
            $about->details = $request->details;
            $about->email_address = $request->email_address;
            $about->phone_number = $request->phone_number;
            $about->address = $request->address;
            $about->about_image = $about_imageUrl;
            $about->save();
        }
        elseif ($cv && $about_image)
        {
            $cvName = $cv->getClientOriginalName();
            $directory = 'images/about/';
            $cv->move($directory, $cvName);
            $cvUrl = $directory.$cvName;
            if ($cv->getClientMimeType() !== 'application/pdf')
            {
                return back()->with('message','You need to upload PDF only');
            }

            $about_imageName = $about_image->getClientOriginalName();
            $directory = 'images/about/';
            $about_image->move($directory, $about_imageName);
            $about_imageUrl = $directory.$about_imageName;

            $about->nick_name = $request->nick_name;
            $about->short_description = $request->short_description;
            $about->details = $request->details;
            $about->cv = $cvUrl;
            $about->email_address = $request->email_address;
            $about->phone_number = $request->phone_number;
            $about->address = $request->address;
            $about->about_image = $about_imageUrl;
            $about->save();
        }
        elseif ($image)
        {
            $imageName = $image->getClientOriginalName();
            $directory = 'images/about/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;

            $about->nick_name = $request->nick_name;
            $about->short_description = $request->short_description;
            $about->background_image = $imageUrl;
            $about->details = $request->details;
            $about->email_address = $request->email_address;
            $about->phone_number = $request->phone_number;
            $about->address = $request->address;
            $about->save();
        }
        elseif ($cv)
        {
            $cvName = $cv->getClientOriginalName();
            $directory = 'images/about/';
            $cv->move($directory, $cvName);
            $cvUrl = $directory.$cvName;

            if ($cv->getClientMimeType() !== 'application/pdf')
            {
                return back()->with('message','You need to upload PDF only');
            }

            $about->nick_name = $request->nick_name;
            $about->short_description = $request->short_description;
            $about->details = $request->details;
            $about->cv = $cvUrl;
            $about->email_address = $request->email_address;
            $about->phone_number = $request->phone_number;
            $about->address = $request->address;
            $about->save();
        }
        elseif ($about_image)
        {
            $about_imageName = $about_image->getClientOriginalName();
            $directory = 'images/about/';
            $about_image->move($directory, $about_imageName);
            $about_imageUrl = $directory.$about_imageName;

            $about->nick_name = $request->nick_name;
            $about->short_description = $request->short_description;
            $about->details = $request->details;
            $about->email_address = $request->email_address;
            $about->phone_number = $request->phone_number;
            $about->address = $request->address;
            $about->about_image = $about_imageUrl;
            $about->save();
        }
        else
        {
            $about->nick_name = $request->nick_name;
            $about->short_description = $request->short_description;
            $about->details = $request->details;
            $about->email_address = $request->email_address;
            $about->phone_number = $request->phone_number;
            $about->address = $request->address;
            $about->save();
        }
        return back()->with('message','About has been updated successfully');
    }
}
