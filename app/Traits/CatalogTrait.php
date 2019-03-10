<?php

namespace App\Traits;

trait CatalogTrait
{
    public function getKeyName()
    {
        return 'key';
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function usesTimestamps()
    {
        return false;
    }

    public function getTimestamps()
    {
        return false;
    }

    public static function getSelectArray($onlyKeys = [])
    {
        $keys = static::query()->orderBy('id', 'asc');

        if ($onlyKeys) {
            $keys = $keys->whereIn('key', $onlyKeys);
        }

        return static::translateKeys($keys->pluck('key')->toArray());
    }

    protected static function translateKeys(array $keys)
    {
        $model = new static();

        $prefix = str_replace('catalog_', $model->getTranslationPrefix(), $model->getTable());

        $translated = [];

        foreach ($keys as $k) {
            $translated[$k] = trans($prefix . '.' . $k);
        }

        return $translated;
    }

    public function getNameAttribute()
    {
        $prefix = str_replace('catalog_', $this->getTranslationPrefix(), $this->getTable());

        return trans($prefix . '.' . $this->key);
    }

    protected function getTranslationPrefix()
    {
        return 'catalog.';
    }

}