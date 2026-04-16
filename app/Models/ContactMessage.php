<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'read_at',
    ];

    public function isRead(): bool
    {
        return $this->read_at != null;
    }
}
