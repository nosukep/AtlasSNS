<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ]; //ユーザーの情報を保存できるようにする。(対：$guarded 値の変更が不可。$fillableか$guardedどちらかのみ設定する。)

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post(){
        return $this->hasMany('App\Post');
    }


    /*
    *フォローされているユーザーを取得
    *引数(接続先,中間テーブル,接続元(フォローされている人、つまりユーザー)が参照する中間テーブルのカラム,接続先(フォローしている人、つまりフォロワー)が参照する中間テーブルのカラム)
    */
    public function followers()
    {
        return $this->belongsToMany(
            'App\User',
            'follows',
            'followed_id',
            'following_id'
        );
    }

    /*
    *フォローしているユーザーを取得
    *引数(接続先,中間テーブル,接続元(フォローする人)が参照する中間テーブルのカラム,接続先(フォローされる人)が参照する中間テーブルのカラム)
    */

    public function follows()
    {
        return $this->belongsToMany(
            'App\User',
            'follows',
            'following_id',
            'followed_id'
        );
    }

     // フォローしているか
    public function isFollowing(Int $user_id)
    {
        // booleanで値の有無(真偽)確認
        // first(['id'])やfind(['id'])だと値を取得しようとして、bladeのforeachと相性が悪くてエラーになる。
        return (boolean) $this->follows()->where('followed_id', $user_id)->exists();
    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->exists();
    }
}
