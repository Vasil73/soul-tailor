<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class BeddingOrder extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'message', 'status', 'ip_address', 'user_agent'];
}
