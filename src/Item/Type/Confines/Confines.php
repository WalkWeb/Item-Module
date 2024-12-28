<?php

declare(strict_types=1);

namespace Item\Type\Confines;

// TODO Подумать как можно избавиться от этого интерфейса

interface Confines
{
    public const P_DAMAGE       = 1;
    public const F_DAMAGE       = 2;
    public const W_DAMAGE       = 3;
    public const A_DAMAGE       = 4;
    public const E_DAMAGE       = 5;
    public const L_DAMAGE       = 6;
    public const D_DAMAGE       = 7;

    public const I_A_SPEED      = 8;
    public const I_S_SPEED      = 9;

    public const DEFENCE        = 10;
    public const MAGIC_DEFENCE  = 11;

    public const ACCURACY       = 12;
    public const MAGIC_ACCURACY = 13;
}
