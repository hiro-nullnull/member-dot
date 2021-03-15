<?php

namespace App\Http\Controllers;

use App\Http\Model\Member;
use App\User;

class TopController extends Controller
{
    public function index()
    {
//        Member::where('', '', '');

        $memberList = [
            (object) [
                'name' => 'どい ふみはる',
                'icon_number' => '001',
                'introduction' => '開発課の長。幅広い知識と技術で開発課を治めている',
            ],
            (object) [
                'name' => 'さいとう ゆういち',
                'icon_number' => '002',
                'introduction' => '強き者。効率化の鬼。楽する方法を探すならこの人に聞くといいでだろう。'
            ],
            (object) [
                'name' => 'おおつか としつな',
                'icon_number' => '003',
                'introduction' => '強く速き者。長ですら理解不能な速さで実装する。'
            ]
        ];

        return view('Top', [
            'memberList' => $memberList
        ]);
    }
}
