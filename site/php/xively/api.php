<?php namespace Xively;

/**
 * Class API - Xively API Client
 *
 * Simple API consumer class for Xively Api using method chaining with PHP magic function.
 * Api endpoints are defined in api_paths.json file. Please submit updates to this file in
 * the event the endpoints are added/removed/changed, etc.
 *
 * @package Xively
 * @author Daniel Boorn <daniel.boorn@gmail.com>
 * @copyright Daniel Boorn
 * @license Creative Commons Attribution-NonCommercial 3.0 Unported (CC BY-NC 3.0)
 */
class API
{

    /**
     * Enable this to output log of chain events and resource call
     *
     * @var bool
     */
    public $debug = false;

    /**
     * Stores API endpoint paths
     *
     * @var
     */
    public $paths;

    /**
     * Current content type (json/xml/csv)
     *
     * @var string
     */
    public $contentType = 'json';

    /**
     * @var array
     */
    protected $pathIds = array();

    /**
     * @var
     */
    protected $endpointId;

    /**
     * @var
     */
    protected $response;

    /**
     * @var
     */
    protected $code;

    /**
     * Api key can be supplied in construct.
     *
     * @var array
     */
    protected $settings = array(
        'apiKey'  => 'z1m6tlvDZoT2WnoPIsDtDB6qYRZkrYF5C6ShVLPRNVyn06cQ',
        'baseUrl' => 'https://api.xively.com/v2',
        'feeed' => '1052499700'
    );

    /**
     * Create new Xively consumer with project Apiåå
     *
     * @param null $key Xively api key
     */
    public function __construct($key = null)
    {
        $this->loadApiPaths();
    }

    /**
     * Debug output
     *
     * @param $obj
     */
    public function d($obj)
    {
        if ($this->debug) var_dump($obj);
    }

    /**
     * Magic method to enable method chaining to api paths
     *
     * @param $name
     * @param $args
     * @return $this|API
     */
    public function __call($name, $args)
    {
        $this->endpointId .= $this->endpointId ? "_{$name}" : $name;
        $this->d($this->endpointId);
        $this->d($args);
        if (isset($this->paths[$this->endpointId])) {
            $r = $this->invoke($this->endpointId, $this->paths[$this->endpointId]['verb'], $this->paths[$this->endpointId]['path'], $this->pathIds, current($args));
            $this->reset();
            return $r;
        }
        if (count($args) > 0 && gettype($args[0]) != "array" && gettype($args[0]) != "object") {
            $this->pathIds[] = array_shift($args);
        }
        return $this;
    }

    /**
     * Reset api endpoint chain
     */
    public function reset()
    {
        $this->endpointId = null;
        $this->pathIds = array();
    }

    /**
     * Change content type to xml
     *
     * @return $this
     */
    public function xml()
    {
        $this->contentType = 'xml';
        return $this;
    }

    /**
     * Change content type to json
     *
     * @return $this
     */
    public function json()
    {
        $this->contentType = 'json';
        return $this;
    }

    /**
     * Change content type to csv
     *
     * @return $this
     */
    public function csv()
    {
        $this->contentType = 'csv';
        return $this;
    }


    /**
     * Parse chained api path with path ids
     *
     * @param $path
     * @param $ids
     * @return string
     * @throws Exception
     */
    protected function parsePath($path, $ids)
    {
        $parts = explode("/", ltrim($path, '/'));
        for ($i = 0; $i < count($parts); $i++) {
            if (empty($parts[$i])) continue;
            if ($parts[$i]{0} == "{") {
                if (count($ids) == 0) throw new Exception("Api Endpoint Path is Missing 1 or More IDs [path={$path}].");
                $parts[$i] = array_shift($ids);
            }
        }
        return '/' . implode("/", $parts);
    }


    /**
     * Fetch endpoint resource from Api
     *
     * @param $verb
     * @param $path
     * @param $params
     * @return array
     * @throws Exception
     */
    protected function fetch($verb, $path, $params)
    {

        $headers = array("X-ApiKey: {$this->settings['apiKey']}");
        $url = "{$this->settings['baseUrl']}{$path}.{$this->contentType}";
        $opts = array(
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HEADER         => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST  => $verb,
            CURLOPT_HTTPHEADER     => $headers,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLINFO_HEADER_OUT    => true,
        );
        if ($verb == "POST" || $verb == "PUT") {
            $opts[CURLOPT_POSTFIELDS] = $this->contentType == "json" ? json_encode($params) : $params;
            $this->d($opts[CURLOPT_POSTFIELDS]);
        } else if ($params) {
            $url .= "?" . http_build_query($params);
        }
        $this->d($url);

        $ch = curl_init($url);
        curl_setopt_array($ch, $opts);
        $response = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($response === false || $code >= 400) {
            throw new Exception($response ? $response : curl_error($ch), $code, $response);
        }

        return array('response' => $response, 'code' => $code);
    }

    /**
     * Invoke (consume) api endpoint. Called when api endpoint chain is completed.
     *
     * @param $id
     * @param $verb
     * @param $path
     * @param null $ids
     * @param null $params
     * @return $this
     * @throws Exception
     */
    public function invoke($id, $verb, $path, $ids = null, $params = null)
    {
        $path = $this->parsePath($path, $ids);
        $this->d("Invoke[$id]: {$verb} {$path}", $params);
        $r = $this->fetch($verb, $path, $params);
        $this->response = $r['response'];
        $this->code = $r['code'];
        $this->d($this->response);
        return $this;
    }

    /**
     * Gets api response (and last response) from api chain
     *
     * @return bool|mixed
     * @throws Exception
     */
    public function get()
    {
        if (empty($this->response) && empty($this->code)) throw new Exception('Nothing to Get. Trigger API Resource First.');
        $r = $this->contentType == "json" ? json_decode($this->response) : $this->response;
        $r = !$r && $this->code == 200 ? true : $r;
        unset($this->response, $this->code);
        return $r;
    }

    /**
     * Load api paths from local JSON file
     */
    protected function loadApiPaths()
    {
        $filename = __DIR__ . "/api_paths.json";
        $this->paths = json_decode(file_get_contents($filename), true);
    }

}
