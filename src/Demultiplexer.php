<?php namespace Demultiplexer;

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
     * Create Demultiplexer function
     *
     * @param $params
     * @return modelDemultiplexer
     */
    public static function create($params, $token = null)
    {
        // create new demultiplexer
        $d = new Demultiplexer();
        $d->params = $params;

        // if no token in parameters, it is generate and check is not already exist
        if(!$token) {
            $token = Demultiplexer::generateToken();
        }

        $d->token = $token;
        $d->save();

        // returns the demultiplexer
        return $d;
    }

    /**
     * Get demultiplexer by his token
     *
     * @param $token
     * @return mixed
     *
     */
    public static function getByToken($token)
    {
        // returns the active demultiplexer by his token
        return Demultiplexer::where('token', '=', $token)
            ->where('is_active', '=', 1)
            ->firstOrFail();
    }

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