<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Marker;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Production;
use App\Models\Service;

class MyPage extends Controller
{
    public function showPost()
    {
        $posts = Post::orderByDesc('id')->paginate(5);
        return view("posts", compact("posts"));
    }
    public function showAbout()
    {
        $about = About::all();
        return view("about",compact("about"));
    }
    public function showContacts()
    {
        return view("contacts");
    }
    public function showProducts()
    {
        $services = Service::all();
        $products = Production::all();
        return view("products", compact("services", "products"));
    }
    public function showLicenses()
    {
        return view("licenses");
    }
    public function showMap()
    {
        $markers=Marker::all();
        $mrks = Marker::paginate(10);
        return view("map", compact("markers","mrks"));
    }
    public function showSuperUser()
    {
        return view("superuser");
    }
}
