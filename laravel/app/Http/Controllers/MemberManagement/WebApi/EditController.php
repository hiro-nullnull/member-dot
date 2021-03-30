<?php


namespace App\Http\Controllers\MemberManagement\WebApi;


use App\Http\Controllers\WebApi;
use App\Http\Model\Entity\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
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
            'isTop' => 'required|boolean',
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
        $isTop = $request->input('isTop');
        $iconName = $request->input('iconName');
        $memberType = $request->input('memberType');
        $introduction = $request->input('introduction');

        // 該当データの送られたパラメーターを更新
        $member = Member::query()
            ->where('id', '=', $memberId)
            ->whereNotNull('deleted_at')
            ->first();

        if (is_null($member)) {
            throw new BadRequestException();
        }

        $member->name = $name;
        $member->is_top = $isTop;
        $member->icon_name = $iconName;
        $member->member_type = $memberType;
        $member->introduction = $introduction;
        $member->updated_at = Date::now()->toDateString();
        $member->save();

        return $this->success([
            'message' => 'へんこうしたよ'
        ]);
    }
}
