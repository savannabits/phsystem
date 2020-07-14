<?php
namespace App\Helpers\Interfaces;
interface Breadcrumb
{
    public static function title(string $title);
    public function url(string $url);
    public function active();
    public function make();
}
