<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Xinax\LaravelGettext\Facades\LaravelGettext;

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

    /**
     * Changes the current language and returns to previous page
     * @param null $locale
     * @return Redirect
     */
    public function changeLang($locale = null)
    {
        LaravelGettext::setLocale($locale);
        return Redirect::to(URL::previous());
    }

}
