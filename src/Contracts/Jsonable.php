<?php

namespace ChrisSantiago82\DhlParcel\Contracts;

interface Jsonable
{
    public function toJson(int $options = 0): string;
}
