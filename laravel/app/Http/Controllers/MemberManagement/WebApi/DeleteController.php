<?php


namespace App\Http\Controllers\MemberManagement\WebApi;


use App\Http\Controllers\WebApi;
use App\Http\Model\Entity\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class DeleteController
{
    use WebApi;

    public function index(Request $request) {
        if ($request->getMethod() !== Request::METHOD_PUT) {
            throw new BadRequestException();
        }

        // 必須パラメーターのバリデーション
        $validator = Validator::make($request->all(), [
            'memberId' => 'required|int',
        ]);

        if ($validator->fails()) {
            return $this->faliure(['message' => 'invalid parameter']);
        }

        $memberId = $request->input('memberId');

        // 該当データのdeleted_atを更新
        /** @var Member $member */
        $member = Member::query()->where('id', '=', $memberId)->first();
        $member->deleted_at = now();
        $member->save();

        return $this->success([]);
    }
}
