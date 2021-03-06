<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'client_id',
        'started_at',
        'finished_at',
        'state_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function state()
    {
        return $this->belongsTo(ProjectState::class);
    }

    public function pieces()
    {
        return $this->hasMany(Piece::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
