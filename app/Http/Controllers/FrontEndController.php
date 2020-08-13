<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Block;
use App\Page;

class FrontEndController extends Controller
{
  function default(){
    $page = setting('site.page');
    $collection = Page::where('slug', $page)->first();
    
    if($collection){
        $blocks = Block::where('page_id', $collection->id)->orderBy('position', 'asc')->get();
        return view($collection->direction, [
            'collection' => json_decode($collection->details, true),
            'page' => $collection,
            'blocks'     => $blocks
        ]);
    }else{
        return view('welcome');
    }    
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

  public function account(){
    return view('layouts.frontend.admin.account');        
  }
}
