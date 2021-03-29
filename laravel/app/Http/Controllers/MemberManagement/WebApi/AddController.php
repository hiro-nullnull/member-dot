<?php


namespace App\Http\Controllers\MemberManagement\WebApi;


use App\Http\Model\Entity\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class AddController
{
    public function __invoke(Request $request) {
        if ($request->getMethod() !== Request::METHOD_POST) {
            throw new BadRequestException();
        }

        // 必須パラメーターのバリデーション
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20',
            'isTop' => 'required|boolean',
            'iconName' => 'required|string',
            'memberType' => 'required|string',
            'introduction' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed'
            ]);
        }

        $name = $request->input('name');
        $isTop = $request->input('isTop');
        $iconName = $request->input('iconName');
        $memberType = $request->input('memberType');
        $introduction = $request->input('introduction');

        // リクエストパラメーターを元にデータを追加
        /** @var Member $member */
        $member = new Member();
        $member->name = $name;
        $member->is_top = $isTop;
        $member->icon_name = $iconName;
        $member->member_type = $memberType;
        $member->introduction = $introduction;
        $member->created_at = Date::now()->toDateString();
        $member->updated_at = Date::now()->toDateString();
        $member->deleted_at = null;
        $member->save();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
