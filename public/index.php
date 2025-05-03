<?php

use Item\Generator\Generator;
use Item\Translator\TranslatorRU;

require_once __DIR__ . '/../vendor/autoload.php';

$translator = new TranslatorRU();
$item = Generator::random(30, 0, 8, '302371e7-2524-46c2-89b5-8ae530c3aa95');

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Item Module</title>
    <meta name="Description" content="">
    <meta name="Keywords" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div class="icon_container">
    <div class="icon">
        <div class="in_section_item icon_shadow_<?= $item->getMagicQuality()->getId() ?>" style="background-size: cover; background-image: url(<?= $item->getIcon() ?>)"></div>
    </div>
</div>
<div class="container">
    <div class="item_d_cont">
        <div class="item_d_top"></div>
        <div class="item_d_body">
            <p class="item_d_name <?= $item->getMagicQuality()->getClassColor() ?>"><?= $item->getName($translator) ?></p>
            <p class="item_d_type"><?= $item->getTypeDescription($translator) ?></p>
            <div class="item_d_line"></div>
            <?= $item->getDescription($translator, 500, 500, 500) ?>
            <div class="item_d_line"></div>
            <?= $item->getMagicDescription($translator) ?>
            <div class="item_d_bl">
                <p>
                    Уровень предмета: <?= $item->getItemLevel() ?><br />
                    Требуемый уровень: <?= $item->getMinLevel() ?>
                </p>
            </div>
            <div class="item_d_br"><p>Вес: <?= $item->getBase()->getWeight() ?><br />Цена: <?= $item->getPrice() ?></p></div>
        </div>
        <div class="item_d_bottom"></div>
    </div>
</div>
<table>
    <tr>
        <td class="title"><b>ID</b></td>
        <td><?= $item->getId() ?></td>
    </tr>
    <tr>
        <td><b>ItemId</b></td>
        <td><?= $item->getDbId() ?></td>
    </tr>
    <tr>
        <td><b>ItemLevel</b></td>
        <td><?= $item->getItemLevel() ?></td>
    </tr>
    <tr>
        <td><b>InventoryId</b></td>
        <td><?= $item->getInventoryId() ?></td>
    </tr>
    <tr>
        <td><b>Name</b></td>
        <td><?= $item->getName($translator) ?></td>
    </tr>
    <tr>
        <td><b>Icon</b></td>
        <td><?= $item->getIcon() ?></td>
    </tr>
    <tr>
        <td><b>Price</b></td>
        <td><?= $item->getPrice() ?></td>
    </tr>
    <tr>
        <td><b>MinLevel</b></td>
        <td><?= $item->getMinLevel() ?></td>
    </tr>
    <tr>
        <td><b>MinStrength</b></td>
        <td><?= $item->getMinStrength() ?></td>
    </tr>
    <tr>
        <td><b>MinDexterity</b></td>
        <td><?= $item->getMinDexterity() ?></td>
    </tr>
    <tr>
        <td><b>MinIntelligence</b></td>
        <td><?= $item->getMinIntelligence() ?></td>
    </tr>
    <tr>
        <td><b>PropertyInfo</b></td>
        <td><?= $item->getPropertyInfo() ?></td>
    </tr>
    <tr>
        <td><b>MagicPropertyInfo</b></td>
        <td><?= $item->getMagicPropertyInfo() ?></td>
    </tr>
    <tr>
        <td><b>Type ID</b></td>
        <td><?= $item->getType()->getId() ?></td>
    </tr>
    <tr>
        <td><b>Type Name</b></td>
        <td><?= $item->getType()->getName() ?></td>
    </tr>
    <tr>
        <td><b>MagicQuality ID</b></td>
        <td><?= $item->getMagicQuality()->getId() ?></td>
    </tr>
    <tr>
        <td><b>MagicQuality Name</b></td>
        <td><?= $item->getMagicQuality()->getName() ?></td>
    </tr>
    <tr>
        <td><b>EquipType ID</b></td>
        <td><?= $item->getEquipType() ? $item->getEquipType()->getId() : 'null' ?></td>
    </tr>
    <tr>
        <td><b>EquipType Name</b></td>
        <td><?= $item->getEquipType() ? $item->getEquipType()->getName() : 'null' ?></td>
    </tr>
    <tr>
        <td><b>SectionType ID</b></td>
        <td><?= $item->getSectionType() ? $item->getSectionType()->getId() : 'null' ?></td>
    </tr>
    <tr>
        <td><b>SectionType Name</b></td>
        <td><?= $item->getSectionType() ? $item->getSectionType()->getName() : 'null' ?></td>
    </tr>
    <tr>
        <td><b>ArmorType ID</b></td>
        <td><?= $item->getArmorType() ? $item->getArmorType()->getId() : 'null' ?></td>
    </tr>
    <tr>
        <td><b>ArmorType Name</b></td>
        <td><?= $item->getArmorType() ? $item->getArmorType()->getName() : 'null' ?></td>
    </tr>
    <tr>
        <td><b>PotionType ID</b></td>
        <td><?= $item->getPotionType() ? $item->getPotionType()->getId() : 'null' ?></td>
    </tr>
    <tr>
        <td><b>PotionType Name</b></td>
        <td><?= $item->getPotionType() ? $item->getPotionType()->getName() : 'null' ?></td>
    </tr>
    <tr>
        <td><b>MagicType ID</b></td>
        <td><?= $item->getMagicType() ? $item->getMagicType()->getId() : 'null' ?></td>
    </tr>
    <tr>
        <td><b>MagicType Name</b></td>
        <td><?= $item->getMagicType() ? $item->getMagicType()->getName() : 'null' ?></td>
    </tr>
    <tr>
        <td colspan="2" class="center"><b>Base</b></td>
    </tr>
    <tr>
        <td><b>Strength</b></td>
        <td><?= $item->getBase()->getStrength() ?></td>
    </tr>
    <tr>
        <td><b>Dexterity</b></td>
        <td><?= $item->getBase()->getDexterity() ?></td>
    </tr>
    <tr>
        <td><b>Intelligence</b></td>
        <td><?= $item->getBase()->getIntelligence() ?></td>
    </tr>
    <tr>
        <td><b>Will</b></td>
        <td><?= $item->getBase()->getWill() ?></td>
    </tr>
    <tr>
        <td><b>Endurance</b></td>
        <td><?= $item->getBase()->getEndurance() ?></td>
    </tr>
    <tr>
        <td><b>Percipience</b></td>
        <td><?= $item->getBase()->getPercipience() ?></td>
    </tr>
    <tr>
        <td><b>Charisma</b></td>
        <td><?= $item->getBase()->getCharisma() ?></td>
    </tr>
    <tr>
        <td><b>Luck</b></td>
        <td><?= $item->getBase()->getLuck() ?></td>
    </tr>
    <tr>
        <td><b>Life</b></td>
        <td><?= $item->getBase()->getLife() ?></td>
    </tr>
    <tr>
        <td><b>IncreaseLife</b></td>
        <td><?= $item->getBase()->getIncreaseLife() ?></td>
    </tr>
    <tr>
        <td><b>Mana</b></td>
        <td><?= $item->getBase()->getMana() ?></td>
    </tr>
    <tr>
        <td><b>IncreaseMana</b></td>
        <td><?= $item->getBase()->getIncreaseMana() ?></td>
    </tr>
    <tr>
        <td><b>Stamina</b></td>
        <td><?= $item->getBase()->getStamina() ?></td>
    </tr>
    <tr>
        <td><b>LifeRegen</b></td>
        <td><?= $item->getBase()->getLifeRegen() ?></td>
    </tr>
    <tr>
        <td><b>ManaRegen</b></td>
        <td><?= $item->getBase()->getManaRegen() ?></td>
    </tr>
    <tr>
        <td><b>bonusConcentration</b></td>
        <td><?= $item->getBase()->getBonusConcentration() ?></td>
    </tr>
    <tr>
        <td><b>bonusCunning</b></td>
        <td><?= $item->getBase()->getBonusCunning() ?></td>
    </tr>
    <tr>
        <td><b>bonusRage</b></td>
        <td><?= $item->getBase()->getBonusRage() ?></td>
    </tr>
    <tr>
        <td><b>IncreaseGold</b></td>
        <td><?= $item->getBase()->getIncreaseGold() ?></td>
    </tr>
    <tr>
        <td><b>StaminaCost</b></td>
        <td><?= $item->getBase()->getStaminaCost() ?></td>
    </tr>
    <tr>
        <td><b>Weight</b></td>
        <td><?= $item->getBase()->getWeight() ?></td>
    </tr>
    <tr>
        <td colspan="2" class="center"><b>Offense</b></td>
    </tr>
    <tr>
        <td><b>WeaponType ID</b></td>
        <td><?= $item->getOffense()->getWeaponType() ? $item->getOffense()->getWeaponType()->getId() : 'null' ?></td>
    </tr>
    <tr>
        <td><b>WeaponType Name</b></td>
        <td><?= $item->getOffense()->getWeaponType() ? $item->getOffense()->getWeaponType()->getName() : 'null' ?></td>
    </tr>
    <tr>
        <td><b>DamageType ID</b></td>
        <td><?= $item->getOffense()->getDamageType() ? $item->getOffense()->getDamageType()->getId() : 'null' ?></td>
    </tr>
    <tr>
        <td><b>DamageType Name</b></td>
        <td><?= $item->getOffense()->getDamageType() ? $item->getOffense()->getDamageType()->getName() : 'null' ?></td>
    </tr>
    <tr>
        <td><b>PhysicalDamage</b></td>
        <td><?= $item->getOffense()->getPhysicalDamage() ?></td>
    </tr>
    <tr>
        <td><b>FireDamage</b></td>
        <td><?= $item->getOffense()->getFireDamage() ?></td>
    </tr>
    <tr>
        <td><b>WaterDamage</b></td>
        <td><?= $item->getOffense()->getWaterDamage() ?></td>
    </tr>
    <tr>
        <td><b>AirDamage</b></td>
        <td><?= $item->getOffense()->getAirDamage() ?></td>
    </tr>
    <tr>
        <td><b>EarthDamage</b></td>
        <td><?= $item->getOffense()->getEarthDamage() ?></td>
    </tr>
    <tr>
        <td><b>LifeDamage</b></td>
        <td><?= $item->getOffense()->getLifeDamage() ?></td>
    </tr>
    <tr>
        <td><b>DeathDamage</b></td>
        <td><?= $item->getOffense()->getDeathDamage() ?></td>
    </tr>
    <tr>
        <td><b>IncreasePhysicalDamage</b></td>
        <td><?= $item->getOffense()->getIncreasePhysicalDamage() ?></td>
    </tr>
    <tr>
        <td><b>IncreaseFireDamage</b></td>
        <td><?= $item->getOffense()->getIncreaseFireDamage() ?></td>
    </tr>
    <tr>
        <td><b>IncreaseWaterDamage</b></td>
        <td><?= $item->getOffense()->getIncreaseWaterDamage() ?></td>
    </tr>
    <tr>
        <td><b>IncreaseAirDamage</b></td>
        <td><?= $item->getOffense()->getIncreaseAirDamage() ?></td>
    </tr>
    <tr>
        <td><b>IncreaseEarthDamage</b></td>
        <td><?= $item->getOffense()->getIncreaseEarthDamage() ?></td>
    </tr>
    <tr>
        <td><b>IncreaseLifeDamage</b></td>
        <td><?= $item->getOffense()->getIncreaseLifeDamage() ?></td>
    </tr>
    <tr>
        <td><b>IncreaseDeathDamage</b></td>
        <td><?= $item->getOffense()->getIncreaseDeathDamage() ?></td>
    </tr>
    <tr>
        <td><b>AttackSpeed</b></td>
        <td><?= $item->getOffense()->getAttackSpeed() ?></td>
    </tr>
    <tr>
        <td><b>CastSpeed</b></td>
        <td><?= $item->getOffense()->getCastSpeed() ?></td>
    </tr>
    <tr>
        <td><b>IncreaseAttackSpeed</b></td>
        <td><?= $item->getOffense()->getIncreaseAttackSpeed() ?></td>
    </tr>
    <tr>
        <td><b>IncreaseCastSpeed</b></td>
        <td><?= $item->getOffense()->getIncreaseCastSpeed() ?></td>
    </tr>
    <tr>
        <td><b>Accuracy</b></td>
        <td><?= $item->getOffense()->getAccuracy() ?></td>
    </tr>
    <tr>
        <td><b>MagicAccuracy</b></td>
        <td><?= $item->getOffense()->getMagicAccuracy() ?></td>
    </tr>
    <tr>
        <td><b>IncreaseAccuracy</b></td>
        <td><?= $item->getOffense()->getIncreaseAccuracy() ?></td>
    </tr>
    <tr>
        <td><b>IncreaseMagicAccuracy</b></td>
        <td><?= $item->getOffense()->getIncreaseMagicAccuracy() ?></td>
    </tr>
    <tr>
        <td><b>BlockIgnoring</b></td>
        <td><?= $item->getOffense()->getBlockIgnore() ?></td>
    </tr>
    <tr>
        <td><b>CriticalChance</b></td>
        <td><?= $item->getOffense()->getCriticalChance() ?></td>
    </tr>
    <tr>
        <td><b>CriticalMultiplier</b></td>
        <td><?= $item->getOffense()->getCriticalMultiplier() ?></td>
    </tr>
    <tr>
        <td><b>IncreaseCriticalChance</b></td>
        <td><?= $item->getOffense()->getIncreaseCriticalChance() ?></td>
    </tr>
    <tr>
        <td><b>DamageMultiplier</b></td>
        <td><?= $item->getOffense()->getDamageMultiplier() ?></td>
    </tr>
    <tr>
        <td><b>Vampirism</b></td>
        <td><?= $item->getOffense()->getVampirism() ?></td>
    </tr>
    <tr>
        <td><b>MagicVampirism</b></td>
        <td><?= $item->getOffense()->getMagicVampirism() ?></td>
    </tr>
    <tr>
        <td colspan="2" class="center"><b>Defense</b></td>
    </tr>
    <tr>
        <td><b>PhysicalResist</b></td>
        <td><?= $item->getDefense()->getPhysicalResist() ?></td>
    </tr>
    <tr>
        <td><b>FireResist</b></td>
        <td><?= $item->getDefense()->getFireResist() ?></td>
    </tr>
    <tr>
        <td><b>WaterResist</b></td>
        <td><?= $item->getDefense()->getWaterResist() ?></td>
    </tr>
    <tr>
        <td><b>AirResist</b></td>
        <td><?= $item->getDefense()->getAirResist() ?></td>
    </tr>
    <tr>
        <td><b>EarthResist</b></td>
        <td><?= $item->getDefense()->getEarthResist() ?></td>
    </tr>
    <tr>
        <td><b>LifeResist</b></td>
        <td><?= $item->getDefense()->getLifeResist() ?></td>
    </tr>
    <tr>
        <td><b>DeathResist</b></td>
        <td><?= $item->getDefense()->getDeathResist() ?></td>
    </tr>
    <tr>
        <td><b>Defense</b></td>
        <td><?= $item->getDefense()->getDefense() ?></td>
    </tr>
    <tr>
        <td><b>MagicDefense</b></td>
        <td><?= $item->getDefense()->getMagicDefense() ?></td>
    </tr>
    <tr>
        <td><b>IncreaseDefense</b></td>
        <td><?= $item->getDefense()->getIncreaseDefense() ?></td>
    </tr>
    <tr>
        <td><b>IncreaseMagicDefense</b></td>
        <td><?= $item->getDefense()->getIncreaseMagicDefense() ?></td>
    </tr>
    <tr>
        <td><b>Block</b></td>
        <td><?= $item->getDefense()->getBlock() ?></td>
    </tr>
    <tr>
        <td><b>MagicBlock</b></td>
        <td><?= $item->getDefense()->getMagicBlock() ?></td>
    </tr>
    <tr>
        <td><b>MentalBarrier</b></td>
        <td><?= $item->getDefense()->getMentalBarrier() ?></td>
    </tr>
    <tr>
        <td><b>PhysicalMaxResist</b></td>
        <td><?= $item->getDefense()->getPhysicalMaxResist() ?></td>
    </tr>
    <tr>
        <td><b>FireMaxResist</b></td>
        <td><?= $item->getDefense()->getFireMaxResist() ?></td>
    </tr>
    <tr>
        <td><b>WaterMaxResist</b></td>
        <td><?= $item->getDefense()->getWaterMaxResist() ?></td>
    </tr>
    <tr>
        <td><b>AirMaxResist</b></td>
        <td><?= $item->getDefense()->getAirMaxResist() ?></td>
    </tr>
    <tr>
        <td><b>EarthMaxResist</b></td>
        <td><?= $item->getDefense()->getEarthMaxResist() ?></td>
    </tr>
    <tr>
        <td><b>LifeMaxResist</b></td>
        <td><?= $item->getDefense()->getLifeMaxResist() ?></td>
    </tr>
    <tr>
        <td><b>DeathMaxResist</b></td>
        <td><?= $item->getDefense()->getDeathMaxResist() ?></td>
    </tr>
    <tr>
        <td><b>GlobalResist</b></td>
        <td><?= $item->getDefense()->getGlobalResist() ?></td>
    </tr>
    <tr>
        <td><b>Dodge</b></td>
        <td><?= $item->getDefense()->getDodge() ?></td>
    </tr>
    <tr>
        <td><b>AddHidden</b></td>
        <td><?= $item->getDefense()->getBonusHidden() ?></td>
    </tr>
</table>
</body>
</html>