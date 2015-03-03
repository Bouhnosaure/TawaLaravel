<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index()
    {
        $data['foo'] = ['test', 'bar','yolo'];
        return View('pages.index', $data);
    }

    public function about()
    {
        return View('pages.about');
    }

}
