<?php


namespace App\Http\Controllers\MemberManagement;


use App\Http\Model\Entity\Member;

class IndexController
{
    public function index()
    {
        $memberList = [];
        $tmpMemberList = Member::query()->whereNull('deleted_at')->orderBy('id')->get();

        $memberList[Member::MEMBER_TYPE_EMPLOYEE] = $tmpMemberList->filter(function ($member) {
            return $member->member_type === Member::MEMBER_TYPE_EMPLOYEE;
        });
        $memberList[Member::MEMBER_TYPE_INTERN] = $tmpMemberList->filter(function ($member) {
            return $member->member_type === Member::MEMBER_TYPE_INTERN;
        });
        $memberList[Member::MEMBER_TYPE_OUTSOURCING] = $tmpMemberList->filter(function ($member) {
            return $member->member_type === Member::MEMBER_TYPE_OUTSOURCING;
        });

        return view('MemberManagement.Index', [
            'memberList' => $memberList
        ]);
    }
}
