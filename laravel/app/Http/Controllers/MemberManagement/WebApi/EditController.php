<?php


namespace App\Http\Controllers\MemberManagement\WebApi;


use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class EditController
{
    public function __invoke(Request $request) {
        if ($request->getMethod() !== Request::METHOD_PUT) {
            throw new BadRequestException();
        }

        // 必須パラメーターのバリデーション

        // 該当データの送られたパラメーターを更新
    }
}
