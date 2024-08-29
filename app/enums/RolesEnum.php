<?php

namespace App\Enums;

enum RolesEnum: string
{
    // case NAMEINAPP = 'name-in-database';

    case CUSTOMERSERVICE = 'customer service';
    case SUPERVISOR = 'supervisor';

    // extra helper to allow for greater customization of displayed values, without disclosing the name/value data directly
    public function label(): string
    {
        return match ($this) {
            static::CUSTOMERSERVICE => 'customer service',
            static::SUPERVISOR => 'supervisor',
        };
    }
}
