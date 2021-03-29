<?php

namespace App\Http\Model\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class Member extends Model
{
    /**
     * メンバーデータを保存するテーブル
     * @var int $id
     * @var string $name
     * @var boolean $is_top
     * @var string $icon_name
     * @var string $member_type
     * @var string $introduction
     * @var Date $created_at
     * @var Date $updated_at
     * @var Date $deleted_at
     *
     */

    const MEMBER_TYPE_EMPLOYEE = 'employee';
    const MEMBER_TYPE_INTERN = 'intern';
    const MEMBER_TYPE_OUTSOURCING = 'outsourcing';

    protected $table = 'members';
}
