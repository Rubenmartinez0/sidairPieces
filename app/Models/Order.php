<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'project_id',
        'created_by',
        'material_id',
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

    
    public function project()
    {
        return $this->hasOne(Project::class);
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function material()
    {
        return $this->hasOne(Material::class);
    }

    public function state()
    {
        return $this->hasOne(OrderState::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
    public function pieces()
    {
        return $this->hasMany(Piece::class);
    }

    
}
