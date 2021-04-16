<?php

namespace App\Http\Controllers\Top;

use App\Http\Controllers\Controller;
use App\Http\Model\Service\MemberService;

class IndexController extends Controller
{
    public function index()
    {
        $memberService = new MemberService();
        $memberList = $memberService->getActiveMembers();

        return view('Top.Index', [
            'memberList' => $memberList
        ]);
    }
}
