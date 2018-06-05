<?php

namespace App\Http\Controllers;

use Gallib\ShortUrl\Url;

class ListController extends Controller
{
    /**
     * Show the shortened links.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urls = Url::orderBy('created_at', 'desc')->paginate(18);

        return view('list', compact('urls'));
    }
}
