<?php


namespace App\Http\Controllers\MemberManagement\WebApi;


use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class DeleteController
{
    public function __invoke(Request $request) {
        if ($request->getMethod() !== Request::METHOD_PUT) {
            throw new BadRequestException();
        }

        // 必須パラメーターのバリデーション

        // 該当データのdeleted_atを更新
    }
}
