<?php


namespace App\Http\Controllers\MemberManagement\WebApi;


use App\Http\Controllers\WebApi;
use App\Http\Model\Entity\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class EditController
{
    use WebApi;

    public function index(Request $request)
    {
        if ($request->getMethod() !== Request::METHOD_PUT) {
            throw new BadRequestException();
        }

        // 必須パラメーターのバリデーション
        $validator = Validator::make($request->all(), [
            'memberId' => 'required|int',
            'name' => 'required|string|max:20',
            'iconName' => 'required|string',
            'memberType' => 'required|string',
            'introduction' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->faliure([
                'message' => 'でーたがたりないよ'
            ]);
        }

        $memberId = $request->input('memberId');
        $name = $request->input('name');
        $iconName = $request->input('iconName');
        $memberType = $request->input('memberType');
        $introduction = $request->input('introduction');

        // 該当データの送られたパラメーターを更新
        /** @var Member $member */
        $member = Member::query()->where('id', '=', $memberId)->first();
        $member->name = $name;
        $member->icon_name = $iconName;
        $member->member_type = $memberType;
        $member->introduction = $introduction;
        $member->updated_at = now();
        $member->save();

        return $this->success([
            'message' => 'へんこうしたよ',
            'data' => [
                'name' => $member->name,
                'iconName' => $member->icon_name,
                'memberType' => $member->member_type,
                'introduction' => $member->introduction,
            ]
        ]);
    }
}
