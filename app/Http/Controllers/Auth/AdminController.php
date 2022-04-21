<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\About;
use App\Models\Marker;
use App\Models\Production;
use App\Models\Service;
use App\Providers\RouteServiceProvider; 

class AdminController extends Controller
{
    public function redirect()
    {
        $about = About::all();
        $markers = Marker::all();
        return view('admin.main',compact('about', 'markers'));
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addPost(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:63'],
            'content' => ['required', 'string', 'max:2043'],
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function redactAbout(Request $request)
    {
        $request->validate([
            'content' => ['required', 'string', 'max:4087'],
        ]);

        About::truncate();

        About::create([
            'content' => $request->content
        ]);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function addService(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Service::create([
            'name' => $request->name,
        ]);

        return redirect()->intended(RouteServiceProvider::HOME);



    }

    public function addMarker(Request $request)
    {
        $request->validate([
            'description' => ['required', 'string', 'max:127'],
            'lat' => ['numeric',  "required"],
            'lng' => ['numeric',  "required"]

        ]);

        Marker::create(
            [
                'description' => $request->description,
                "lat" => $request->lat,
                "lng" => $request->lng
            ]
        );

        return redirect()->intended(RouteServiceProvider::HOME);

    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:63'],
            'description' => ['required', 'string', 'max:2043'],
            'image' => ['image', 'max:9112', "mimes:jpg,png,jpeg,gif,svg"]
        ]);

        //$localPath = $request->file('image');
        ///$path = $request->file('image')->store('public/productImages');

        Production::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => ""
        ]);
 
 
        


        return redirect()->intended(RouteServiceProvider::HOME);
    }
  
}
