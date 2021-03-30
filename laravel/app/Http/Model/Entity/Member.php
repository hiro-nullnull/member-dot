<?php

namespace App\Http\Model\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

/**
 * メンバーデータを保存するテーブル
 * @property int id
 * @property string name
 * @property boolean is_top
 * @property string icon_name
 * @property string member_type
 * @property string introduction
 * @property Date created_at
 * @property Date updated_at
 * @property Date deleted_at
 *
 */
class Member extends Model
{
    const MEMBER_TYPE_EMPLOYEE = 'employee';
    const MEMBER_TYPE_INTERN = 'intern';
    const MEMBER_TYPE_OUTSOURCING = 'outsourcing';

    protected $table = 'members';
}
