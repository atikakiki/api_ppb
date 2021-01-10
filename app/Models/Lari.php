<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lari extends Model
{
    use HasFactory;

    protected $table = 'riwayat_lari';
    protected $primaryKey = 'id_exercise';

    public $timestamps = false;

    protected $fillable = [
        'id_user', 'koordinat_awal', 'koordinat_akhir', 'ss_bb', 'steps',
    ];
}
