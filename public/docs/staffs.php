<?php

use Item\Affix\Type\AffixType;
use Item\Drawing\DataProvider\Staff;
use Item\Drawing\Stat\StatFactory;
use Item\ItemInterface;
use Item\Material\DataProvider\Metal;
use Item\Translator\TranslatorRU;
use Item\Type\Quality\Quality;
use Item\Type\Quality\QualityInterface;

require_once __DIR__ . '/../../vendor/autoload.php';

$translator = new TranslatorRU();
$material = Metal::get('iron');

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Staffs</title>
    <meta name="Description" content="">
    <meta name="Keywords" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" type="text/css" href="/css/docs.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div class="content">
    <table class="d_table">
        <tbody>
        <tr>
            <td class="btll"></td>
            <td class="btl"></td>
            <td class="btc"></td>
            <td class="btr"></td>
            <td class="btrr"></td>
        </tr>
        <tr>
            <td class="blt"></td>
            <td class="tl"></td>
            <td class="tc" rowspan="2" id="normal">
                Посохи
            </td>
            <td class="tr"></td>
            <td class="brt"></td>
        </tr>
        <tr>
            <td class="emptyborder"></td>
            <td class="tlborder">&nbsp;</td>
            <td class="trborder">&nbsp;</td>
            <td class="emptyborder"></td>
        </tr>
        <tr>
            <td class="emptyborder"></td>
            <td colspan="3">
                <table class="table_content">
                    <tr class="header">
                        <td><p>Иконка</p></td>
                        <td><p>Название</p></td>
                        <td><p>Необходимый<br />уровень</p></td>
                        <td><p>Необходимо<br />силы</p></td>
                        <td><p>Необходимо<br />ловкости</p></td>
                        <td><p>Необходимо<br />интеллекта</p></td>
                        <td><p>Вес</p></td>
                        <td><p>Цена</p></td>
                        <td><p>Две<br />руки</p></td>
                        <td class="w350"><p>Свойства<br />(качество материала: 1.0, стихия: физическая)</p></td>
                        <td class="w250"><p>Исключенные<br />свойства</p></td>
                        <td><p>Пример названия<br />с префиксом</p></td>
                    </tr>
                    <?php

                    foreach (Staff::getAll() as $drawing) {
                        $quality = new Quality(QualityInterface::EXCELLENT, $drawing->getGenderType());

                        $minStrength = (int)((ItemInterface::BASE_STAT_REQUIREMENT + $drawing->getMinLevel() * ItemInterface::STAT_REQUIREMENT_PER_LEVEL) * $drawing->getStrength() * $material->getQuality());
                        $minDexterity = (int)((ItemInterface::BASE_STAT_REQUIREMENT + $drawing->getMinLevel() * ItemInterface::STAT_REQUIREMENT_PER_LEVEL) * $drawing->getDexterity() * $material->getQuality());
                        $minIntelligence = (int)((ItemInterface::BASE_STAT_REQUIREMENT + $drawing->getMinLevel() * ItemInterface::STAT_REQUIREMENT_PER_LEVEL) * $drawing->getIntelligence() * $material->getQuality());

                        $price = (int)($drawing->getPrice() * $quality->getValue() * $material->getQuality());

                        $stats = '';
                        $exceptions = '';

                        $damage = StatFactory::baseDamage($drawing, $material);

                        if ($damage) {
                            $stats .= $translator->trans($damage->getName()) . ': ' . $damage->getValue() . $damage->getSuffix() . '<br />';
                        }

                        foreach ($drawing->getStats() as $stat) {
                            if ($stat->getName() === 'offense.attackSpeed' || $stat->getName() === 'offense.castSpeed') {
                                $stats .= $translator->trans($stat->getName()) . ': ' . ($stat->getValue() / 100) . $stat->getSuffix() . '<br />';
                            } else {
                                $stats .= $translator->trans($stat->getName()) . ' ' . $stat->getValue() . $stat->getSuffix() . '<br />';
                            }
                        }

                        foreach ($drawing->getAffixException() as $exception) {
                            $exceptions .= (new AffixType($exception))->getName() . '<br />';
                        }

                        echo
                            '<tr class="tbc2">
                             <td><img src="' . $drawing->getIcon() . '" width="70" alt=""></td>
                             <td><p><b>' . $translator->trans($drawing->getName()) . '</b><br />(' . $drawing->getName() . ')</p></td>
                             <td><p><span class="yellow">' . $drawing->getMinLevel() . '</span></p></td>
                             <td><p><span class="red">' . $minStrength . '</span></p></td>
                             <td><p><span class="green">' . $minDexterity . '</span></p></td>
                             <td><p><span class="dark_blue">' . $minIntelligence . '</span></p></td>
                             <td><p>' . $drawing->getWeight() . '</p></td>
                             <td><p>' . $price . '</p></td>
                             <td><p>' . ($drawing->isTwoHand() ? 'да' : 'нет') . '</p></td>
                             <td><p><span class="blue">' . $stats . '</span></p></td>
                             <td><p><span class="blue">' . $exceptions . '</span></p></td>
                             <td><p>' . $translator->trans($quality->getPrefix()) . ' ' . $translator->trans($drawing->getName()) . '</p></td>
                         </tr>';
                    }
                    ?>
                </table>
            </td>
            <td class="emptyborder"></td>
        </tr>
        <tr>
            <td class="bll"></td>
            <td class="bl"></td>
            <td class="bc"></td>
            <td class="br"></td>
            <td class="brr"></td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>