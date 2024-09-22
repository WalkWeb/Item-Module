<?php

declare(strict_types=1);

namespace Item;

class Item
{
    private int $id;
    private int $db_id;
    private int $type_id;
    private ?int $equip_id;
    private int $magic_id;
    /** Секция под экипировку, если это экипировка */
    private int $section_id;
    /** В какой секции инвентаря находится предмет */
    private int $inventory_id;
    private ?int $type_weapon_id;
    private ?int $type_armor_id;
    private ?int $type_potion_id;
    private string $name;
    private string $icon;
    private int $rarity;
    private int $STR;
    private int $INT;
    private int $DEX;
    private int $WILL;
    private int $END;
    private int $PERC;
    private int $CHAR;
    private int $LUCK;
    private int $HP;
    private int $MANA;
    private int $STAM;
    private int $HORROR;
    private int $sharpening;
    private int $price;
    private int $P_DAMAGE;
    private int $F_DAMAGE;
    private int $W_DAMAGE;
    private int $A_DAMAGE;
    private int $E_DAMAGE;
    private int $L_DAMAGE;
    private int $D_DAMAGE;
    private int $P_I_DAMAGE;
    private int $F_I_DAMAGE;
    private int $W_I_DAMAGE;
    private int $A_I_DAMAGE;
    private int $E_I_DAMAGE;
    private int $L_I_DAMAGE;
    private int $D_I_DAMAGE;
    private int $P_DEFENCE;
    private int $F_DEFENCE;
    private int $W_DEFENCE;
    private int $A_DEFENCE;
    private int $E_DEFENCE;
    private int $L_DEFENCE;
    private int $D_DEFENCE;
    private int $P_M_DEFENCE;
    private int $F_M_DEFENCE;
    private int $W_M_DEFENCE;
    private int $A_M_DEFENCE;
    private int $E_M_DEFENCE;
    private int $L_M_DEFENCE;
    private int $D_M_DEFENCE;
    private int $ACCURACY;
    private int $MAGIC_ACCURACY;
    private int $DEFENCE;
    private int $MAGIC_DEFENCE;
    private int $I_ACCURACY;
    private int $I_MAGIC_ACCURACY;
    private int $I_DEFENCE;
    private int $I_MAGIC_DEFENCE;
    private int $CRIT_C;
    private int $I_CRIT_C;
    private int $CRIT_M;
    private int $A_SPEED;
    private int $S_SPEED;
    private int $I_A_SPEED;
    private int $I_S_SPEED;
    private int $BLOCK;
    private int $S_BLOCK;
    private int $BLOCK_IGNORE;
    private int $S_BLOCK_IGNORE;
    private int $DODGE;
    private int $ADD_CONCENTRATION;
    private int $ADD_CUNNING;
    private int $ADD_RAGE;
    private int $G_DAMAGE;
    private int $G_DEFENCE;
    private ?int $TYPE_DAMAGE;
    private ?int $ROW;
    private int $itemlevel;
    private int $MIN_LVL;
    private int $MIN_STR;
    private int $MIN_INT;
    private int $MIN_DEX;
    private int $weight;
    private string $desc;
    private string $magic_desc;
    private int $I_HP;
    private int $I_MANA;
    private int $HP_REGEN;
    private int $MP_REGEN;
    private int $I_GOLD;
    private int $ADD_HIDDEN;
    private int $STAM_COST;
    private int $BELT_SLOT;
    private ?int $ether_id;
    /** Является ли предмет двуручным оружием: 0 - нет, 1 - да */
    private int $two_hand;
    /** является ли это оружие псевдо оружием - когда надо отобразить двуручное оружие в левой руке */
    private bool $shadow;

    public function __construct(int $id, int $db_id, int $type_id, ?int $equip_id, int $magic_id, int $section_id, int $inventory_id, ?int $type_weapon_id, ?int $type_armor_id, ?int $type_potion_id, string $name, string $icon, int $rarity, int $STR, int $INT, int $DEX, int $WILL, int $END, int $PERC, int $CHAR, int $LUCK, int $HP, int $MANA, int $STAM, int $HORROR, int $sharpening, int $price, int $P_DAMAGE, int $F_DAMAGE, int $W_DAMAGE, int $A_DAMAGE, int $E_DAMAGE, int $L_DAMAGE, int $D_DAMAGE, int $P_I_DAMAGE, int $F_I_DAMAGE, int $W_I_DAMAGE, int $A_I_DAMAGE, int $E_I_DAMAGE, int $L_I_DAMAGE, int $D_I_DAMAGE, int $P_DEFENCE, int $F_DEFENCE, int $W_DEFENCE, int $A_DEFENCE, int $E_DEFENCE, int $L_DEFENCE, int $D_DEFENCE, int $P_M_DEFENCE, int $F_M_DEFENCE, int $W_M_DEFENCE, int $A_M_DEFENCE, int $E_M_DEFENCE, int $L_M_DEFENCE, int $D_M_DEFENCE, int $ACCURACY, int $MAGIC_ACCURACY, int $DEFENCE, int $MAGIC_DEFENCE, int $I_ACCURACY, int $I_MAGIC_ACCURACY, int $I_DEFENCE, int $I_MAGIC_DEFENCE, int $CRIT_C, int $I_CRIT_C, int $CRIT_M, int $A_SPEED, int $S_SPEED, int $I_A_SPEED, int $I_S_SPEED, int $BLOCK, int $S_BLOCK, int $BLOCK_IGNORE, int $S_BLOCK_IGNORE, int $DODGE, int $ADD_CONCENTRATION, int $ADD_CUNNING, int $ADD_RAGE, int $G_DAMAGE, int $G_DEFENCE, ?int $TYPE_DAMAGE, ?int $ROW, int $itemlevel, int $MIN_LVL, int $MIN_STR, int $MIN_INT, int $MIN_DEX, int $weight, string $desc, string $magic_desc, int $I_HP, int $I_MANA, int $HP_REGEN, int $MP_REGEN, int $I_GOLD, int $ADD_HIDDEN, int $STAM_COST, int $BELT_SLOT, ?int $ether_id, int $two_hand, bool $shadow)
    {
        $this->id = $id;
        $this->db_id = $db_id;
        $this->type_id = $type_id;
        $this->equip_id = $equip_id;
        $this->magic_id = $magic_id;
        $this->section_id = $section_id;
        $this->inventory_id = $inventory_id;
        $this->type_weapon_id = $type_weapon_id;
        $this->type_armor_id = $type_armor_id;
        $this->type_potion_id = $type_potion_id;
        $this->name = $name;
        $this->icon = $icon;
        $this->rarity = $rarity;
        $this->STR = $STR;
        $this->INT = $INT;
        $this->DEX = $DEX;
        $this->WILL = $WILL;
        $this->END = $END;
        $this->PERC = $PERC;
        $this->CHAR = $CHAR;
        $this->LUCK = $LUCK;
        $this->HP = $HP;
        $this->MANA = $MANA;
        $this->STAM = $STAM;
        $this->HORROR = $HORROR;
        $this->sharpening = $sharpening;
        $this->price = $price;
        $this->P_DAMAGE = $P_DAMAGE;
        $this->F_DAMAGE = $F_DAMAGE;
        $this->W_DAMAGE = $W_DAMAGE;
        $this->A_DAMAGE = $A_DAMAGE;
        $this->E_DAMAGE = $E_DAMAGE;
        $this->L_DAMAGE = $L_DAMAGE;
        $this->D_DAMAGE = $D_DAMAGE;
        $this->P_I_DAMAGE = $P_I_DAMAGE;
        $this->F_I_DAMAGE = $F_I_DAMAGE;
        $this->W_I_DAMAGE = $W_I_DAMAGE;
        $this->A_I_DAMAGE = $A_I_DAMAGE;
        $this->E_I_DAMAGE = $E_I_DAMAGE;
        $this->L_I_DAMAGE = $L_I_DAMAGE;
        $this->D_I_DAMAGE = $D_I_DAMAGE;
        $this->P_DEFENCE = $P_DEFENCE;
        $this->F_DEFENCE = $F_DEFENCE;
        $this->W_DEFENCE = $W_DEFENCE;
        $this->A_DEFENCE = $A_DEFENCE;
        $this->E_DEFENCE = $E_DEFENCE;
        $this->L_DEFENCE = $L_DEFENCE;
        $this->D_DEFENCE = $D_DEFENCE;
        $this->P_M_DEFENCE = $P_M_DEFENCE;
        $this->F_M_DEFENCE = $F_M_DEFENCE;
        $this->W_M_DEFENCE = $W_M_DEFENCE;
        $this->A_M_DEFENCE = $A_M_DEFENCE;
        $this->E_M_DEFENCE = $E_M_DEFENCE;
        $this->L_M_DEFENCE = $L_M_DEFENCE;
        $this->D_M_DEFENCE = $D_M_DEFENCE;
        $this->ACCURACY = $ACCURACY;
        $this->MAGIC_ACCURACY = $MAGIC_ACCURACY;
        $this->DEFENCE = $DEFENCE;
        $this->MAGIC_DEFENCE = $MAGIC_DEFENCE;
        $this->I_ACCURACY = $I_ACCURACY;
        $this->I_MAGIC_ACCURACY = $I_MAGIC_ACCURACY;
        $this->I_DEFENCE = $I_DEFENCE;
        $this->I_MAGIC_DEFENCE = $I_MAGIC_DEFENCE;
        $this->CRIT_C = $CRIT_C;
        $this->I_CRIT_C = $I_CRIT_C;
        $this->CRIT_M = $CRIT_M;
        $this->A_SPEED = $A_SPEED;
        $this->S_SPEED = $S_SPEED;
        $this->I_A_SPEED = $I_A_SPEED;
        $this->I_S_SPEED = $I_S_SPEED;
        $this->BLOCK = $BLOCK;
        $this->S_BLOCK = $S_BLOCK;
        $this->BLOCK_IGNORE = $BLOCK_IGNORE;
        $this->S_BLOCK_IGNORE = $S_BLOCK_IGNORE;
        $this->DODGE = $DODGE;
        $this->ADD_CONCENTRATION = $ADD_CONCENTRATION;
        $this->ADD_CUNNING = $ADD_CUNNING;
        $this->ADD_RAGE = $ADD_RAGE;
        $this->G_DAMAGE = $G_DAMAGE;
        $this->G_DEFENCE = $G_DEFENCE;
        $this->TYPE_DAMAGE = $TYPE_DAMAGE;
        $this->ROW = $ROW;
        $this->itemlevel = $itemlevel;
        $this->MIN_LVL = $MIN_LVL;
        $this->MIN_STR = $MIN_STR;
        $this->MIN_INT = $MIN_INT;
        $this->MIN_DEX = $MIN_DEX;
        $this->weight = $weight;
        $this->desc = $desc;
        $this->magic_desc = $magic_desc;
        $this->I_HP = $I_HP;
        $this->I_MANA = $I_MANA;
        $this->HP_REGEN = $HP_REGEN;
        $this->MP_REGEN = $MP_REGEN;
        $this->I_GOLD = $I_GOLD;
        $this->ADD_HIDDEN = $ADD_HIDDEN;
        $this->STAM_COST = $STAM_COST;
        $this->BELT_SLOT = $BELT_SLOT;
        $this->ether_id = $ether_id;
        $this->two_hand = $two_hand;
        $this->shadow = $shadow;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDbId(): int
    {
        return $this->db_id;
    }

    public function getTypeId(): int
    {
        return $this->type_id;
    }

    public function getEquipId(): ?int
    {
        return $this->equip_id;
    }

    public function getMagicId(): int
    {
        return $this->magic_id;
    }

    public function getSectionId(): int
    {
        return $this->section_id;
    }

    public function getInventoryId(): int
    {
        return $this->inventory_id;
    }

    public function getTypeWeaponId(): ?int
    {
        return $this->type_weapon_id;
    }

    public function getTypeArmorId(): ?int
    {
        return $this->type_armor_id;
    }

    public function getTypePotionId(): ?int
    {
        return $this->type_potion_id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getRarity(): int
    {
        return $this->rarity;
    }

    public function getSTR(): int
    {
        return $this->STR;
    }

    public function getINT(): int
    {
        return $this->INT;
    }

    public function getDEX(): int
    {
        return $this->DEX;
    }

    public function getWILL(): int
    {
        return $this->WILL;
    }

    public function getEND(): int
    {
        return $this->END;
    }

    public function getPERC(): int
    {
        return $this->PERC;
    }

    public function getCHAR(): int
    {
        return $this->CHAR;
    }

    public function getLUCK(): int
    {
        return $this->LUCK;
    }

    public function getHP(): int
    {
        return $this->HP;
    }

    public function getMANA(): int
    {
        return $this->MANA;
    }

    public function getSTAM(): int
    {
        return $this->STAM;
    }

    public function getHORROR(): int
    {
        return $this->HORROR;
    }

    public function getSharpening(): int
    {
        return $this->sharpening;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getPDAMAGE(): int
    {
        return $this->P_DAMAGE;
    }

    public function getFDAMAGE(): int
    {
        return $this->F_DAMAGE;
    }

    public function getWDAMAGE(): int
    {
        return $this->W_DAMAGE;
    }

    public function getADAMAGE(): int
    {
        return $this->A_DAMAGE;
    }

    public function getEDAMAGE(): int
    {
        return $this->E_DAMAGE;
    }

    public function getLDAMAGE(): int
    {
        return $this->L_DAMAGE;
    }

    public function getDDAMAGE(): int
    {
        return $this->D_DAMAGE;
    }

    public function getPIDAMAGE(): int
    {
        return $this->P_I_DAMAGE;
    }

    public function getFIDAMAGE(): int
    {
        return $this->F_I_DAMAGE;
    }

    public function getWIDAMAGE(): int
    {
        return $this->W_I_DAMAGE;
    }

    public function getAIDAMAGE(): int
    {
        return $this->A_I_DAMAGE;
    }

    public function getEIDAMAGE(): int
    {
        return $this->E_I_DAMAGE;
    }

    public function getLIDAMAGE(): int
    {
        return $this->L_I_DAMAGE;
    }

    public function getDIDAMAGE(): int
    {
        return $this->D_I_DAMAGE;
    }

    public function getPDEFENCE(): int
    {
        return $this->P_DEFENCE;
    }

    public function getFDEFENCE(): int
    {
        return $this->F_DEFENCE;
    }

    public function getWDEFENCE(): int
    {
        return $this->W_DEFENCE;
    }

    public function getADEFENCE(): int
    {
        return $this->A_DEFENCE;
    }

    public function getEDEFENCE(): int
    {
        return $this->E_DEFENCE;
    }

    public function getLDEFENCE(): int
    {
        return $this->L_DEFENCE;
    }

    public function getDDEFENCE(): int
    {
        return $this->D_DEFENCE;
    }

    public function getPMDEFENCE(): int
    {
        return $this->P_M_DEFENCE;
    }

    public function getFMDEFENCE(): int
    {
        return $this->F_M_DEFENCE;
    }

    public function getWMDEFENCE(): int
    {
        return $this->W_M_DEFENCE;
    }

    public function getAMDEFENCE(): int
    {
        return $this->A_M_DEFENCE;
    }

    public function getEMDEFENCE(): int
    {
        return $this->E_M_DEFENCE;
    }

    public function getLMDEFENCE(): int
    {
        return $this->L_M_DEFENCE;
    }

    public function getDMDEFENCE(): int
    {
        return $this->D_M_DEFENCE;
    }

    public function getACCURACY(): int
    {
        return $this->ACCURACY;
    }

    public function getMAGICACCURACY(): int
    {
        return $this->MAGIC_ACCURACY;
    }

    public function getDEFENCE(): int
    {
        return $this->DEFENCE;
    }

    public function getMAGICDEFENCE(): int
    {
        return $this->MAGIC_DEFENCE;
    }

    public function getIACCURACY(): int
    {
        return $this->I_ACCURACY;
    }

    public function getIMAGICACCURACY(): int
    {
        return $this->I_MAGIC_ACCURACY;
    }

    public function getIDEFENCE(): int
    {
        return $this->I_DEFENCE;
    }

    public function getIMAGICDEFENCE(): int
    {
        return $this->I_MAGIC_DEFENCE;
    }

    public function getCRITC(): int
    {
        return $this->CRIT_C;
    }

    public function getICRITC(): int
    {
        return $this->I_CRIT_C;
    }

    public function getCRITM(): int
    {
        return $this->CRIT_M;
    }

    public function getASPEED(): int
    {
        return $this->A_SPEED;
    }

    public function getSSPEED(): int
    {
        return $this->S_SPEED;
    }

    public function getIASPEED(): int
    {
        return $this->I_A_SPEED;
    }

    public function getISSPEED(): int
    {
        return $this->I_S_SPEED;
    }

    public function getBLOCK(): int
    {
        return $this->BLOCK;
    }

    public function getSBLOCK(): int
    {
        return $this->S_BLOCK;
    }

    public function getBLOCKIGNORE(): int
    {
        return $this->BLOCK_IGNORE;
    }

    public function getSBLOCKIGNORE(): int
    {
        return $this->S_BLOCK_IGNORE;
    }

    public function getDODGE(): int
    {
        return $this->DODGE;
    }

    public function getADDCONCENTRATION(): int
    {
        return $this->ADD_CONCENTRATION;
    }

    public function getADDCUNNING(): int
    {
        return $this->ADD_CUNNING;
    }

    public function getADDRAGE(): int
    {
        return $this->ADD_RAGE;
    }

    public function getGDAMAGE(): int
    {
        return $this->G_DAMAGE;
    }

    public function getGDEFENCE(): int
    {
        return $this->G_DEFENCE;
    }

    public function getTYPEDAMAGE(): ?int
    {
        return $this->TYPE_DAMAGE;
    }

    public function getROW(): ?int
    {
        return $this->ROW;
    }

    public function getItemlevel(): int
    {
        return $this->itemlevel;
    }

    public function getMINLVL(): int
    {
        return $this->MIN_LVL;
    }

    public function getMINSTR(): int
    {
        return $this->MIN_STR;
    }

    public function getMININT(): int
    {
        return $this->MIN_INT;
    }

    public function getMINDEX(): int
    {
        return $this->MIN_DEX;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function getDesc(): string
    {
        return $this->desc;
    }

    public function getMagicDesc(): string
    {
        return $this->magic_desc;
    }

    public function getIHP(): int
    {
        return $this->I_HP;
    }

    public function getIMANA(): int
    {
        return $this->I_MANA;
    }

    public function getHPREGEN(): int
    {
        return $this->HP_REGEN;
    }

    public function getMPREGEN(): int
    {
        return $this->MP_REGEN;
    }

    public function getIGOLD(): int
    {
        return $this->I_GOLD;
    }

    public function getADDHIDDEN(): int
    {
        return $this->ADD_HIDDEN;
    }

    public function getSTAMCOST(): int
    {
        return $this->STAM_COST;
    }

    public function getBELTSLOT(): int
    {
        return $this->BELT_SLOT;
    }

    public function getEtherId(): ?int
    {
        return $this->ether_id;
    }

    public function getTwoHand(): int
    {
        return $this->two_hand;
    }

    public function isShadow(): bool
    {
        return $this->shadow;
    }
}
