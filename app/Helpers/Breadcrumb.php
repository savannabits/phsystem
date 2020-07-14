<?php


namespace App\Helpers;

class Breadcrumb implements \App\Helpers\Interfaces\Breadcrumb
{
    private $title = "";
    private $url = "";
    private $active = false;

    /**
     * @param string $title
     * @return Breadcrumb
     */
    public static function title(string $title)
    {
        $instance = new self;
        $instance->title = $title;
        return $instance;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function url(string $url)
    {
        $this->url = url($url);
        return $this;
    }

    public function active()
    {
        $this->active = true;
        return $this;
    }

    /**
     * @return array
     */
    public function make()
    {
        return [
            "title" => $this->title,
            "url" => $this->url,
            "active" => $this->active,
        ];
    }
}
