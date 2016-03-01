<?php

namespace laravel\pagseguro\Platform;

/**
 * Platform Laravel
 *
 * @category   Platform
 * @package    Laravel\PagSeguro
 *
 * @author     Isaque de Souza <isaquesb@gmail.com>
 * @since      2016-01-15
 *
 * @copyright  Laravel\PagSeguro
 */
class Laravel implements PlatformInterface
{

    /**
     * @return array
     */
    public function getUrlParameters()
    {
        return \Input::all();
    }

    /**
     * @return boolean
     */
    public function hasPersonalConfig()
    {
        return true;
    }

    /**
     * @param string $key
     * @return array
     */
    public function getConfigByKey($key)
    {
        return \Config::get($key);
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function setConfigByKey($key, $value)
    {
        \Config::set($key, $value);
    }

    /**
     * @return void
     */
    public function abort()
    {
        \App::abort(500);
    }

    /**
     * @return boolean
     */
    public function hasRouter()
    {
        return true;
    }

    /**
     * @return void
     */
    public function registerNotificationRoute()
    {
        $controller = '\laravel\pagseguro\Notification\NotificationController';
        \Route::get('/pagseguro/notification', "{$controller}@notification", [
            'as' => 'pagseguro.notification',
            'uses' => "{$controller}@notification"
        ]);
    }

    /**
     * @param string $routeName
     * @return void
     */
    public function getUrlByRoute($routeName)
    {
        return \URL::route($routeName);
    }
}
