<?php

declare(strict_types=1);

namespace Item\Affix\Type;

interface AffixTypeInterface
{
    // base
    public const ADD_LIFE                 = 1; // no weapon
    public const ADD_MANA                 = 2; // no weapon
    public const INCREASE_LIFE            = 3; // body armor and helmet only
    public const INCREASE_MANA            = 4; // body armor and helmet only
    public const ADD_LIFE_REGEN           = 5; // ring only
    public const ADD_MANA_REGEN           = 6; // amulet only
    public const ADD_STAMINA              = 7; // amulet, ring and boots only
    public const ADD_MAX_HORROR           = 8; // amulet and rings only
    public const ADD_STRENGTH             = 9;
    public const ADD_DEXTERITY            = 10;
    public const ADD_INTELLIGENCE         = 11;
    public const ADD_WILL                 = 12;
    public const ADD_ENDURANCE            = 13;
    public const ADD_PERCIPIENCE          = 14;
    public const ADD_CHARISMA             = 15; // ring only
    public const ADD_LUCK                 = 16; // amulet only
    public const ADD_BELT_SLOT            = 17; // belt only
    public const ADD_STAMINA_COST         = 18; // boots only
    public const ADD_BONUS_CONCENTRATION        = 19; // amulet and ring
    public const ADD_BONUS_CUNNING         = 20; // amulet and ring
    public const ADD_BONUS_RAGE                 = 21; // amulet and ring
    public const INCREASE_GOLD            = 22; // helmet only
    public const MIGHT                    = 23; // shoulders only
    public const MAGIC                    = 24; // shoulders only
    public const BRUTALITY                = 25; // helmet, body armor and legs only
    public const FRAGILITY                = 26; // helmet, body armor and legs only
    public const BRUTE_FORCE              = 27; // boots and shoulders only
    public const FRAGILE_MIND             = 28; // boots and shoulders only

    // offense
    public const ADD_PHYSICAL_DAMAGE      = 100; // amulet, rings, gloves and weapon
    public const ADD_FIRE_DAMAGE          = 101; // amulet, rings, gloves and weapon
    public const ADD_WATER_DAMAGE         = 102; // amulet, rings, gloves and weapon
    public const ADD_AIR_DAMAGE           = 103; // amulet, rings, gloves and weapon
    public const ADD_EARTH_DAMAGE         = 104; // amulet, rings, gloves and weapon
    public const ADD_LIFE_DAMAGE          = 105; // amulet, rings, gloves and weapon
    public const ADD_DEATH_DAMAGE         = 106; // amulet, rings, gloves and weapon
    public const INCREASE_PHYSICAL_DAMAGE = 107; // amulet, gloves and weapon only
    public const INCREASE_FIRE_DAMAGE     = 108; // amulet, gloves and weapon only
    public const INCREASE_WATER_DAMAGE    = 109; // amulet, gloves and weapon only
    public const INCREASE_AIR_DAMAGE      = 110; // amulet, gloves and weapon only
    public const INCREASE_EARTH_DAMAGE    = 111; // amulet, gloves and weapon only
    public const INCREASE_LIFE_DAMAGE     = 112; // amulet, gloves and weapon only
    public const INCREASE_DEATH_DAMAGE    = 113; // amulet, gloves and weapon only
    public const ADD_ACCURACY             = 114; // amulet, ring, gloves and weapon only
    public const ADD_MAGIC_ACCURACY       = 115; // amulet, ring, gloves and weapon only
    public const INCREASE_ACCURACY        = 116; // amulet, ring, gloves and weapon only
    public const INCREASE_MAGIC_ACCURACY  = 117; // amulet, ring, gloves and weapon only
    public const INCREASE_ATTACK_SPEED    = 118; // amulet and gloves only
    public const INCREASE_CAST_SPEED      = 119; // amulet and gloves only
    public const INCREASE_CRITICAL_CHANCE = 120; // amulet, ring, gloves and weapon only
    public const ADD_CRITICAL_MULTIPLIER  = 121; // amulet, gloves and weapon only
    public const ADD_BLOCK_IGNORE         = 122; // two hand weapon only
    public const ADD_VAMPIRISM            = 123; // amulet only
    public const ADD_MAGIC_VAMPIRISM      = 124; // amulet only
    public const ADD_DAMAGE_MULTIPLIER    = 125; // gloves only
    public const DOUBLE_PHYSICAL_DAMAGE   = 126; // two hand weapon only
    public const DOUBLE_FIRE_DAMAGE       = 127; // two hand weapon only
    public const DOUBLE_WATER_DAMAGE      = 128; // two hand weapon only
    public const DOUBLE_AIR_DAMAGE        = 129; // two hand weapon only
    public const DOUBLE_EARTH_DAMAGE      = 130; // two hand weapon only
    public const DOUBLE_LIFE_DAMAGE       = 131; // two hand weapon only
    public const DOUBLE_DEATH_DAMAGE      = 132; // two hand weapon only
    public const MOBILITY                 = 133; // gloves only
    public const MAGIC_MOBILITY           = 134; // gloves only
    public const ENCHANT                  = 135; // two hand weapon only

    // defense
    public const ADD_PHYSICAL_RESIST      = 200; // no weapon
    public const ADD_FIRE_RESIST          = 201; // no weapon
    public const ADD_WATER_RESIST         = 202; // no weapon
    public const ADD_AIR_RESIST           = 203; // no weapon
    public const ADD_EARTH_RESIST         = 204; // no weapon
    public const ADD_LIFE_RESIST          = 205; // no weapon
    public const ADD_DEATH_RESIST         = 206; // no weapon
    public const ADD_MAX_PHYSICAL_RESIST  = 207; // body armor and shield only
    public const ADD_MAX_FIRE_RESIST      = 208; // body armor and shield only
    public const ADD_MAX_WATER_RESIST     = 209; // body armor and shield only
    public const ADD_MAX_AIR_RESIST       = 210; // body armor and shield only
    public const ADD_MAX_EARTH_RESIST     = 211; // body armor and shield only
    public const ADD_MAX_LIFE_RESIST      = 212; // body armor and shield only
    public const ADD_MAX_DEATH_RESIST     = 213; // body armor and shield only
    public const ADD_MAX_ALL_RESIST       = 214; // body armor and shield only
    public const ADD_DEFENSE              = 215; // amulet, ring and armor only
    public const ADD_MAGIC_DEFENSE        = 216; // amulet, ring and armor only
    public const INCREASE_DEFENSE         = 217; // amulet, ring and armor only
    public const INCREASE_MAGIC_DEFENSE   = 218; // amulet, ring and armor only
    public const ADD_BLOCK                = 219; // shield only
    public const ADD_MAGIC_BLOCK          = 220; // shield only
    public const ADD_MENTAL_BARRIER       = 221; // amulet only
    public const ADD_GLOBAL_RESIST        = 222; // shield only
    public const ADD_DODGE                = 223; // no use
    public const ADD_HIDDEN               = 224; // boots and legs only
}
