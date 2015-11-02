<?php namespace Demultiplexer\Models\Business;

use Demultiplexer\Models\Db\Demultiplexer as modelDemultiplexer;

class Demultiplexer
{
    /**
     * Create Demultiplexer function
     *
     * @param $params
     * @return modelDemultiplexer
     */
    public static function create($params, $token = null)
    {
        // create new demultiplexer
        $d = new modelDemultiplexer();
        $d->params = $params;

        // if no token in parameters, it is generate and check is not already exist
        if(!$token) {
            $token = modelDemultiplexer::generateToken();
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
        return modelDemultiplexer::where('token', '=', $token)
                                    ->where('is_active', '=', 1)
                                    ->firstOrFail();
    }
}