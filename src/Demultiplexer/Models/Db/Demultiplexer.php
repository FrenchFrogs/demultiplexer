<?php namespace Demultiplexer\Models\Db;

use Illuminate\Database\Eloquent\Model;

class Demultiplexer extends Model
{
    protected $primaryKey = 'demultiplexer_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'demultiplexer';

    /**
     * Generate a token for demultiplexer
     *
     * @return string
     */
    public static function generateToken()
    {
        // generate token which not exists already
        while(true){
            $token = str_random(30);
            if(!self::where('token', '=', $token)->first()){
                return $token;
            }
        }
    }
}