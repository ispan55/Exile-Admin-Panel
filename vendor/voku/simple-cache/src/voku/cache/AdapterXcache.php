<?php

namespace voku\cache;

/**
 * AdapterXcache: Xcache-adapter
 *
 * @package   voku\cache
 */
class AdapterXcache implements iAdapter
{
  public $installed = false;

  /**
   * __construct
   */
  public function __construct()
  {
    if (extension_loaded('xcache') === true) {
      $this->installed = true;
    }
  }

  /**
   * get cached-item by key
   *
   * @param String $key
   *
   * @return mixed
   */
  public function get($key)
  {
    return xcache_get($key);
  }

  /**
   * set cache-item ky key => value
   *
   * @param string $key
   * @param mixed $value
   *
   * @return bool
   */
  public function set($key, $value)
  {
    return xcache_set($key, $value);
  }

  /**
   * set expired
   *
   * @param $key
   * @param $value
   * @param $ttl
   *
   * @return bool
   */
  public function setExpired($key, $value, $ttl)
  {
    return xcache_set($key, $value, $ttl);
  }

  /**
   * remove one cache-item
   *
   * @param $key
   *
   * @return bool
   */
  public function remove($key)
  {
    return xcache_unset($key);
  }

  /**
   * remove all cache-items
   *
   * @return bool
   */
  public function removeAll()
  {
    if (defined('XC_TYPE_VAR')) {
      $xCacheCount = xcache_count(XC_TYPE_VAR);
      for ($i = 0; $i < $xCacheCount; $i++) {
        xcache_clear_cache(XC_TYPE_VAR, $i);
      }

      return true;
    }

    return false;
  }

  /**
   * exists
   *
   * @param $key
   *
   * @return bool
   */
  public function exists($key)
  {
    return xcache_isset($key);
  }

  /**
   * check if cache is installed
   *
   * @return boolean
   */
  public function installed()
  {
    return $this->installed;
  }

}
