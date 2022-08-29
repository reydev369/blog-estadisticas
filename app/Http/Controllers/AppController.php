<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Helpers\UserSystemInfoHelper;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;
class AppController extends Controller
{


    public function index(){
        $getip = UserSystemInfoHelper::get_ip();
        $getbrowser = UserSystemInfoHelper::get_browsers();
        $getdevice = UserSystemInfoHelper::get_device();
        $getos = UserSystemInfoHelper::get_os();
        $visitor = DB::table('visitors')->where('ip_address',$getip)->first();

        
        if(!$visitor){
            Visitor::create([
                'ip_address' => $getip,
                'browser' => $getbrowser,
                'device' => $getdevice,
                'os' => $getos
            ]);
        }

        //se muestran todas las entradas
        $posts = Post::all();

        return view('inicio', compact('posts'));

    }

    public function nosotros(){
        return view('nosotros');
    }
}
