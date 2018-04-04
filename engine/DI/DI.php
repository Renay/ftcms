<?php
namespace Engine\DI;
/**
 * Dependency Injection Class
 * @property object|null navigation
 * @package Engine\DI
 */
class DI
{
    /**
     * Dependency container
     * @var array
     */
    private $container = [];

    /**
     * Get dependency from the container
     *
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        return $this->has($key) ? $this->container[$key] : null;
    }

    /**
     * Add dependency to container
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value)
    {
        $this->container[$key] = $value;

        return $this;
    }

    /**
     * Get dependency from the container
     *
     * @param $key
     * @return mixed|null
     */
    public function __get($key)
    {
        return $this->container[$key] ?: null;
    }

    /**
     * Add dependency to container
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function __set($key, $value)
    {
        $this->container[$key] = $value;

        return $this;
    }


    /**
     * See if there is a dependency in the container
     *
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return isset($this->container[$key]);
    }
}