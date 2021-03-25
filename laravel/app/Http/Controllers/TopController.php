<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TopController extends Controller
{
    public function index()
    {
        $memberList = [];
        $tmpMemberList = DB::table('members')->get();
        foreach ($tmpMemberList as $tmpMember) {
            $memberList[$tmpMember->member_type][] = $tmpMember;
        }

        return view('Top', [
            'memberList' => $memberList
        ]);
    }
}
