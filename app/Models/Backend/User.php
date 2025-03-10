<?php

namespace App\Models\Backend;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password', 'google2fa_secret', 'alias_name', 'slug', 'gender', 'avatar', 'status', 'description', 'social_links'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token', 'google2fa_secret'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function permission()
    {
        return $this->hasOne(Permission::class);
    }

    public function role()
    {
        return $this->belongsToMany(Role::class, Permission::class);
    }

    public function getRoleAttribute()
    {
        return $this->role()
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public function getPermissionsAttribute()
    {
        return $this->permission->permissions;
    }

    public function allArticles()
    {
        return $this->hasMany(Article::class, 'writer_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'writer_id')->activeAndPublish();
    }

    public function getIsEditorAttribute($value)
    {
        return $this->role->slug == 'editor';
    }


    public function getIsWriterAttribute($value)
    {
        return $this->role->slug == 'writer';
    }

    public function getIsAdminAttribute($value)
    {
        return $this->role->slug == 'admin';
    }

    // scope

    public function scopeWriter($query)
    {
        return $query->whereHas('permission.role', function ($q) {
            $q->where('slug', 'writer');
        });
    }

    public function scopeEditor($query)
    {
        return $query->whereHas('permission.role', function ($q) {
            $q->where('slug', 'editor');
        });
    }

    // stat

    public function getTodayStat($task_status)
    {

        if($task_status == "writing"){
            $condition = 'created_at';
        }elseif($task_status == "published"){
            $condition = 'published_at';
        }else{
            $condition = 'updated_at';
        }
        $data = Article::where('task_status', $task_status)->whereDate($condition,  Carbon::today());

        if ($this->isEditor) {
            $data = $data->where(function ($q) {
                $q->where('writer_id', $this->id)->orWhere('editor_id', $this->id);
            });

        }
        else {
            $data = $data->where(function ($q) {
                $q->where('writer_id', $this->id);
            });
        }
        return $data->count();
    }

    public function getYesterdayStat($task_status)
    {
        if($task_status == "writing"){
            $condition = 'created_at';
        }elseif($task_status == "published"){
            $condition = 'published_at';
        }else{
            $condition = 'updated_at';
        }
        $data = Article::where('task_status', $task_status)->whereDate($condition,  Carbon::yesterday());

        if ($this->isEditor) {
            $data = $data->where(function ($q) {
                $q->where('writer_id', $this->id)->orWhere('editor_id', $this->id);
            });

        }
        else {
            $data = $data->where(function ($q) {
                $q->where('writer_id', $this->id);
            });
        }
        return $data->count();
    }

    public function getThisWeekStat($task_status)
    {
        if($task_status == "writing"){
            $condition = 'created_at';
        }elseif($task_status == "published"){
            $condition = 'published_at';
        }else{
            $condition = 'updated_at';
        }
        $data = Article::where('task_status', $task_status)->whereDate($condition, '>=', carbon()->startOfWeek(Carbon::SUNDAY));
        if ($this->isEditor) {
            $data = $data->where(function ($q) {
                $q->where('writer_id', $this->id)->orWhere('editor_id', $this->id);
            });
            // dd($data->get());
        } else {
            $data = $data->where('writer_id', $this->id);
        }

        return $data->count();
    }

    public function getLastWeekStat($task_status)
    {
        if($task_status == "writing"){
            $condition = 'created_at';
        }elseif($task_status == "published"){
            $condition = 'published_at';
        }else{
            $condition = 'updated_at';
        }
        $data = Article::where('task_status', $task_status)
            ->whereBetween(
                $condition,

                [
                    carbon()
                        ->subWeek()
                        ->startOfWeek(Carbon::SUNDAY),

                    carbon()
                        ->subWeek()
                        ->endOfWeek(Carbon::SATURDAY)
                ]
            );

        if ($this->isEditor) {
            $data = $data->where(function ($q) {
                $q->where('writer_id', $this->id)->orWhere('editor_id', $this->id);
            });
            // dd($data->get());
        } else {
            $data = $data->where('writer_id', $this->id);
        }

        return $data->count();
    }

    public function getThisMonthStat($task_status)
    {
        if($task_status == "writing"){
            $condition = 'created_at';
        }elseif($task_status == "published"){
            $condition = 'published_at';
        }else{
            $condition = 'updated_at';
        }
        $data = Article::where('task_status', $task_status)
            ->whereDate($condition, '>=', carbon()->startOfMonth());
        if ($this->isEditor) {
            $data = $data->where(function ($q) {
                $q->where('writer_id', $this->id)->orWhere('editor_id', $this->id);
            });
            // dd($data->get());
        } else {
            $data = $data->where('writer_id', $this->id);
        }

        return $data->count();
    }

    public function getLastMonthStat($task_status)
    {
        if($task_status == "writing"){
            $condition = 'created_at';
        }elseif($task_status == "published"){
            $condition = 'published_at';
        }else{
            $condition = 'updated_at';
        }
        $data = Article::where('task_status', $task_status)
            ->whereBetween(
                $condition,
                [
                    carbon()
                        ->subMonth()
                        ->startOfMonth(),
                    carbon()
                        ->subMonth()
                        ->endOfMonth(),
                ]
            );

        if ($this->isEditor) {
            $data = $data->where(function ($q) {
                $q->where('writer_id', $this->id)->orWhere('editor_id', $this->id);
            });
            // dd($data->get());
        } else {
            $data = $data->where('writer_id', $this->id);
        }

        return $data->count();
    }
}
