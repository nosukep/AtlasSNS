<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'following_id', 'followed_id'
    ]; //フォロワーの情報を保存できるようにする。(対：$guarded 値の変更が不可。$fillableか$guardedどちらかのみ設定する。)
}
