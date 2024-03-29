<?php


namespace App\Http\Controllers\MemberManagement\WebApi;


use App\Http\Controllers\WebApi;
use App\Http\Model\Entity\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class AddController
{
    use WebApi;

    public function index(Request $request)
    {
        if ($request->getMethod() !== Request::METHOD_POST) {
            throw new BadRequestException();
        }

        // 必須パラメーターのバリデーション
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20',
            'iconName' => 'required|string',
            'memberType' => 'required|string',
            'introduction' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->faliure([
                'message' => 'ふぉーむをうめて'
            ]);
        }

        $name = $request->input('name');
        $iconName = $request->input('iconName');
        $memberType = $request->input('memberType');
        $introduction = $request->input('introduction');

        // リクエストパラメーターを元にデータを追加
        /** @var Member $member */
        $member = new Member();
        $member->name = $name;
        $member->icon_name = $iconName;
        $member->member_type = $memberType;
        $member->introduction = $introduction;
        $member->created_at = now();
        $member->updated_at = now();
        $member->deleted_at = null;
        $member->save();

        return $this->success([
            'message' => 'ふやしたよ'
        ]);
    }
}
