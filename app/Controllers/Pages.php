<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Home",
            "tes" => ["suat", "dua", "tiga"]
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            "title" => "About"
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            "title" => "Contact",
            "alamat" => [
                [
                    'tipe' => 'rumah',
                    'alamat' => 'Jl. abc No. 123',
                    'kota' => 'Ngabang'
                ],
                [
                    'tipe' => 'kantor',
                    'alamat' => 'Jl. afz No. 321',
                    'kota' => 'Pontianak'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
