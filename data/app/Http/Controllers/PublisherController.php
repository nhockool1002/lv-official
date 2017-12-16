<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Publisher;
class PublisherController extends Controller
{
    public function listPublisher(){
        $pub = Publisher::all();
		return view('admin.publisher.publisher', ['pub' => $pub]);
    }
}
