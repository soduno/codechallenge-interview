<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['account_id', 'description', 'amount'];

    public function Account()
    {
        return $this->hasOne(Account::class, 'id');
    }
}
