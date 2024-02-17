<?php
 
namespace App\Http\Controllers;

use Illuminate\View\View;
 
class HomeController extends Controller{
    public function index(): View{
        return view('home.index');
    }

    public function contact(): View{
        $title = "Contact us - Online Store";
        $subtitle = "Contact us";
        $email = "jmgomezp@jm.com";
        $address = "Fifth Avenue";
        $phoneNumber = "301 000";

        return view('home.contact') -> with('title', $title) 
            -> with('subtitle', $subtitle) 
            -> with('email', $email)
            -> with('address', $address) 
            -> with('phoneNumber', $phoneNumber);
    }
}

?>