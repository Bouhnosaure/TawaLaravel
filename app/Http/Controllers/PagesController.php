<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    /**
     * Show the index page
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return View('pages.index');
    }

    /**
     * show the about page
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return View('pages.about');
    }

}
