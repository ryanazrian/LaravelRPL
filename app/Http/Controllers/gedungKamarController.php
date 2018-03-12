<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gedungKamarController extends Controller
{
    public function getIndex() {
        $gedungs = array('' => '');
        foreach(gedungs::all() as $row)
            $gedungs[$row->id] = $row->gedungs;
         
        return View::make('index', array(
            'gedungs' => $gedungs
        ));
    }
     
    public function postData() {
        switch(Input::get('type')):
            case 'kamars':
                $return = '<option value=""></option>';
                foreach(kamars::where('gedung_id', Input::get('id'))->get() as $row) 
                    $return .= "<option value='$row->id'>$row->namaKamar</option>";
                return $return;
            break;
        endswitch;    
    }
}
