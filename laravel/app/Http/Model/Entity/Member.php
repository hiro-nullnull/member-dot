<?php

namespace App\Http\Model\Entity;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * メンバーデータを保存するテーブル
     * @var int id
     *
     */

    const MEMBER_TYPE_EMPLOYEE = 'employee';
    const MEMBER_TYPE_INTERN = 'intern';
    const MEMBER_TYPE_OUTSOURCING = 'outsourcing';

    protected $table = 'members';
}
