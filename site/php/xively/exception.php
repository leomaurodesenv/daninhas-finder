<?php namespace Xively;


/**
 * Class Exception - Xively Api Client Exception
 *
 *
 * @author Daniel Boorn <daniel.boorn@gmail.com>
 * @copyright Daniel Boorn
 * @license Creative Commons Attribution-NonCommercial 3.0 Unported (CC BY-NC 3.0)
 * @package Xively
 */
class Exception extends \Exception
{

    /**
     * @var null
     */
    public $response;

    /**
     * @var null
     */
    public $extra;

    /**
     * Custom exception to allow api endpoint response and extra information from curl request
     *
     * @param string $message
     * @param int $code
     * @param null $response
     * @param null $extra
     * @param null $previous
     */
    public function __construct($message, $code = 0, $response = null, $extra = null, $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->response = $response;
        $this->extra = $extra;
    }

    /**
     * Response getter
     *
     * @return null
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Extra getter
     *
     * @return null
     */
    public function getExtra()
    {
        return $this->extra;
    }

}

