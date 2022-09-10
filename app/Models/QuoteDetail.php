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
class QuoteDetail extends Model
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
    protected $fillable = ['quote_id', 'analysis_id', 'price'];

    public function analyses()
    {
        return $this->belongsTo(Analyses::class, 'analysis_id', 'id')->select('id', 'description');
    }


}
