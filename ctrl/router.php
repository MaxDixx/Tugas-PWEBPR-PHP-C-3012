<?php
class Router {
    private static $urls = [];

    public static function url($url, $method, $callback) {
        $url = trim($url, '/');
        self::$urls[strtoupper($method)][$url] = $callback;
        self::$urls['routes'][] = $url;
        self::$urls['routes'] = array_unique(self::$urls['routes']);
    }

    public static function dispatch() {
        $url = self::getUrl();
        $method = $_SERVER['REQUEST_METHOD'];

        if (!in_array($url, self::$urls['routes'])) {
            header('Location: '. BASEURL);
            exit;
        }

        if (isset(self::$urls[$method][$url])) {
            call_user_func(self::$urls[$method][$url]);
        } else {
            header('HTTP/1.0 405 Method Not Allowed');
            exit;
        }
    }

    private static function getUrl() {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $baseUrl = $_ENV['BASEDIR']?? ''; 
        $url = str_replace($baseUrl, '', $url);
        $url = trim($url, '/');
        return $url;
    }
}
$_ENV['BASEDIR'] = '/path/to/base/directory';
?>