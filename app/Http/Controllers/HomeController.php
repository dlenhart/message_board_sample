<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Http;
use Config;

class HomeController extends Controller
{
    public function index()
    {
      $messages = Message::all();

      return view('home', [
        'messages' => $messages
      ]);
    }

    public function validateAddress() {

      $base = "https://maps.googleapis.com/maps/api/geocode/json?address=";

      $apiKey = "AIzaSyCEHEZWTJNGWq-tWYhL24JueZwDV8Akxpg";

      $address = "3715 Kirklynn Drive";

      $formattedAddress = str_replace(" ", "+", $address);

      $url = $base . $formattedAddress . "&key=" . $apiKey;

      $response = Http::get($url);

      echo $response['status'];

      if($response['status'] == "OK"){
        echo $response['results'][0]['geometry']['location']['lat'];
      }

      //echo $response['results'][0]['geometry']['location'];


      //echo \config('services.google.key');

    }
}
