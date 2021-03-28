<?php

namespace App\Http\Controllers\Top;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $memberList = [];
        $tmpMemberList = DB::table('members')->get();
        foreach ($tmpMemberList as $tmpMember) {
            $memberList[$tmpMember->member_type][] = $tmpMember;
        }

        return view('Top.Index', [
            'memberList' => $memberList
        ]);
    }
}
