<?php

namespace BondarDe\Colors\Utils;

class ConstructorUtil
{
    public static function toConstructorArray(array $data, array $keys): array
    {
        if (self::isProperlyFormatted($data, $keys)) {
            return $data;
        }

        $res = [];
        foreach ($keys as $idx => $key) {
            $res[$key] = $data[$idx];
        }

        return $res;
    }

    private static function isProperlyFormatted(array $data, array $keys): bool
    {
        $dataKeys = array_keys($data);
        $sortedKeys = $keys;

        sort($dataKeys);
        sort($sortedKeys);

        $implodedDataKeys = implode(',', $dataKeys);
        $implodedKeys = implode(',', $sortedKeys);

        return $implodedDataKeys === $implodedKeys;
    }
}
