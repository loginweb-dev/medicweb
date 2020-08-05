<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Block;
use App\Page;
use App\User;
class FrontEndController extends Controller
{
    function default()
    {
      return view('layouts.frontend.welcome');        
    }
    public function pages($slug)
    {
        $collection = Page::where('slug', $slug)->first();
        $blocks = Block::where('page_id', $collection->id)->orderBy('position', 'asc')->get();
        return view($collection->direction, [
            'collection' => json_decode($collection->details, true),
            'page' => $collection,
            'blocks'     => $blocks
        ]);
    }
}
