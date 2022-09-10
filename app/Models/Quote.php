<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $email
 * @property string $telf
 * @property string $created_at
 * @property string $updated_at
 */
class Quote extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['client_name', 'moment', 'amount', 'status', 'created_at', 'updated_at'];


    public function details() {
        return $this->hasMany(QuoteDetail::class);
    }


}
