<?php


namespace App\Http\Controllers\MemberManagement;


use App\Http\Controllers\Controller;
use App\Http\Model\Service\MemberService;

class IndexController extends Controller
{
    public function index()
    {
        $memberService = new MemberService();
        $memberList = $memberService->getActiveMembers();

        return view('MemberManagement.Index', [
            'memberList' => $memberList
        ]);
    }
}
