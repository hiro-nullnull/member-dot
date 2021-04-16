<?php


namespace App\Http\Model\Service;


use App\Http\Model\Entity\Member;

class MemberService
{
    /**
     * @return array
     */
    public function getActiveMembers()
    {
        $memberList = [];

        $memberTypeList = [
            Member::MEMBER_TYPE_EMPLOYEE,
            Member::MEMBER_TYPE_INTERN,
            Member::MEMBER_TYPE_OUTSOURCING,
        ];
        foreach ($memberTypeList as $memberType) {
            $memberList[$memberType] = Member::query()
                ->where('member_type', '=', $memberType)
                ->whereNull('deleted_at')
                ->orderBy('id')
                ->get();
        }

        return $memberList;
    }
}
