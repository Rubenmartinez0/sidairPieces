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
        'client_id',
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

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function state()
    {
        return $this->belongsTo(PieceState::class);
    }

    public function type()
    {
        return $this->belongsTo(PieceType::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }


    public function order()
    {
        return $this->belongsTo(Order::class);
    }



}
