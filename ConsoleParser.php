<?php
declare(strict_types=1);

namespace App;

class ConsoleParser
{
    /**
     * Получить логер из аргументов
     * @param array $args
     * @return string|null
     */
    public function getLogger(array $args): ?string
    {
        foreach ($args as $item) {
            if (mb_strpos($item, '--logger') !== false && mb_strpos($item, '=') !== false) {
                $temp = explode('=', $item)[1];
                if (!is_null($temp)) {
                    return $temp;
                }
            }
        }
        return null;
    }
    /**
     * Получить город из аргументов
     * @param array $args
     * @return string|null
     */
    public function getCity(array $args): ?string
    {
        foreach ($args as $item) {
            if (mb_strpos($item, '--city') !== false && mb_strpos($item, '=') !== false) {
                $temp = explode('=', $item)[1];
                if (!is_null($temp)) {
                    return $temp;
                }
            }
        }
        return null;
    }
}