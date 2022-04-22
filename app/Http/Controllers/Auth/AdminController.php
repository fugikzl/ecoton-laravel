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
use Laravel\Ui\Presets\React;

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

    public function postTitleEdit(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:63'],
            'id' => ['required', 'int'],
        ]);

        Post::where("id",intval($request->id))->update(["title" => $request->title]);

        return redirect()->intended("/");

    }

    public function postContentEdit(Request $request)
    {
        $request->validate([
            'content' => ['required', 'string', 'max:2043'],
            'id' => ['required', 'int'],
        ]);

        Post::where("id",intval($request->id))->update(["content" => $request->content]);

        return redirect()->intended("/");

    }

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

    public function deleteService(Request $request)
    {
        $request->validate([
            'id' => ['required', 'int']
        ]);

        Service::where("id",intval($request->id))->delete();

        return redirect()->intended("products");

    }

    public function changeService(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'id' => ['required', 'int']
        ]);

        Service::where("id",intval($request->id))->update(["name" => $request->name]);

        return redirect()->intended("products");

    }

    function redactMarker(Request $request)
    {
        $request->validate([
            'description' => ['required', 'string', 'max:127'],
            'id' => ['required', 'int']
        ]);

        Marker::where("id",intval($request->id))->update(["description" => $request->description]);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    function deleteMarker(Request $request)
    {
        $request->validate([
            'id' => ['required', 'int']
        ]);

        Marker::where("id",intval($request->id))->delete();

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
