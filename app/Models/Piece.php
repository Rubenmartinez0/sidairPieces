<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'quantity',
        'measurements',
        //'image_id',
        'order_id',
        'type_id',
        'material_id',
        'state_id',
        'project_id',
        'ordered_by',
        'ordered_at',
        'manufactured_by',
        'manufactured_at',
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
        return $this->belongsTo(Project::class);
    }

    public function state()
    {
        return $this->belongsTo(PieceState::class);
    }

    // public function type()
    // {
    //     return $this->hasOne(PieceType::class);
    // }
    public function type()
    {
        return $this->belongsTo(PieceType::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
    public function ordered_by()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }



}
