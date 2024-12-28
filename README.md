# Item-Module

## Item tier

| Items Tier | Need Level |
|:----------:|:----------:|
| 1          | 1          |
| 2          | 5          |
| 3          | 9          |
| 4          | 13         |
| 5          | 18         |
| 6          | 22         |

## Weapon DPS

| Items Tier | One hand weapon DPS | Two hand weapon DPS |
|:----------:|:-------------------:|:-------------------:|
| 1          | 12                  | 17                  |
| 2          | 26                  | 38                  |
| 3          | 43                  | 65                  |
| 4          | 60                  | 91                  |
| 5          | 77                  | 118                 |
| 6          | 94                  | 144                 |

One hand dps weapon formula:

```php
$dps = floor(9 + $level * 3.4);
```

Two hand dps weapon formula:

```php
$dps = floor(12 + $level * 5.3);
```

## Calculate base damage (crossbows as an example)

| Name                  | Level | DPS   | Damage | Attack Speed | Critical Chance | Critical Multiplier |
|:--------------------- |:-----:|:-----:|:------:|:------------:|:---------------:|:-------------------:|
| Light crossbow        | 1     | 17    | 15     | 1            | 10              | 200                 |
| Militiaman's Crossbow | 1     | 17    | 17     | 0.8          | 15              | 250                 |
| Heavy crossbow        | 1     | 17    | 22     | 0.6          | 15              | 300                 |
| Arquebus              | 5     | 38    | 35     | 1            | 10              | 200                 |
| Crossbow              | 5     | 38    | 39     | 0.8          | 15              | 250                 |
| Double crossbow       | 5     | 38    | 49     | 0.6          | 15              | 300                 |
| Self-loading crossbow | 9     | 59    | 54     | 1            | 10              | 200                 |
| Siege Crossbow        | 9     | 59    | 60     | 0.8          | 15              | 250                 |
| Double Heavy Crossbow | 9     | 59    | 76     | 0.6          | 15              | 300                 |
| Rapid Fire Crossbow   | 13    | 80    | 73     | 1            | 10              | 200                 |
| Dwarven Crossbow      | 13    | 80    | 82     | 0.8          | 15              | 250                 |
| Scourge of Magicians  | 13    | 80    | 103    | 0.6          | 15              | 300                 |
| Compound crossbow     | 18    | 107   | 97     | 1            | 10              | 200                 |
| The Storm of Knights  | 18    | 107   | 109    | 0.8          | 15              | 250                 |
| Ballista              | 18    | 107   | 137    | 0.6          | 15              | 300                 |
| Multi-shot crossbow   | 22    | 128   | 116    | 1            | 10              | 200                 |
| Hydra Crossbow        | 22    | 128   | 131    | 0.8          | 15              | 250                 |
| Dragon Slayer         | 22    | 128   | 164    | 0.6          | 15              | 300                 |

Example code:

```php
$crossbows = [
    // tier 1
    "Light crossbow" => [
        'level'               => 1,
        'speed'               => 1,
        'critical_chance'     => 10,
        'critical_multiplier' => 200,
    ],
    "Militiaman's Crossbow" => [
        'level'               => 1,
        'speed'               => 0.8,
        'critical_chance'     => 15,
        'critical_multiplier' => 250,
    ],
    "Heavy crossbow" => [
        'level'               => 1,
        'speed'               => 0.6,
        'critical_chance'     => 15,
        'critical_multiplier' => 300,
    ],
    // tier 2
    "Arquebus" => [
        'level'               => 5,
        'speed'               => 1,
        'critical_chance'     => 10,
        'critical_multiplier' => 200,
    ],
    "Crossbow" => [
        'level'               => 5,
        'speed'               => 0.8,
        'critical_chance'     => 15,
        'critical_multiplier' => 250,
    ],
    "Double crossbow" => [
        'level'               => 5,
        'speed'               => 0.6,
        'critical_chance'     => 15,
        'critical_multiplier' => 300,
    ],
    // tier 3
    "Self-loading crossbow" => [
        'level'               => 9,
        'speed'               => 1,
        'critical_chance'     => 10,
        'critical_multiplier' => 200,
    ],
    "Siege Crossbow" => [
        'level'               => 9,
        'speed'               => 0.8,
        'critical_chance'     => 15,
        'critical_multiplier' => 250,
    ],
    "Double Heavy Crossbow" => [
        'level'               => 9,
        'speed'               => 0.6,
        'critical_chance'     => 15,
        'critical_multiplier' => 300,
    ],
    // tier 4
    "Rapid Fire Crossbow" => [
        'level'               => 13,
        'speed'               => 1,
        'critical_chance'     => 10,
        'critical_multiplier' => 200,
    ],
    "Dwarven Crossbow" => [
        'level'               => 13,
        'speed'               => 0.8,
        'critical_chance'     => 15,
        'critical_multiplier' => 250,
    ],
    "Scourge of Magicians" => [
        'level'               => 13,
        'speed'               => 0.6,
        'critical_chance'     => 15,
        'critical_multiplier' => 300,
    ],
    // tier 5
    "Compound crossbow" => [
        'level'               => 18,
        'speed'               => 1,
        'critical_chance'     => 10,
        'critical_multiplier' => 200,
    ],
    "The Storm of Knights" => [
        'level'               => 18,
        'speed'               => 0.8,
        'critical_chance'     => 15,
        'critical_multiplier' => 250,
    ],
    "Ballista" => [
        'level'               => 18,
        'speed'               => 0.6,
        'critical_chance'     => 15,
        'critical_multiplier' => 300,
    ],
    // tier 6
    "Multi-shot crossbow" => [
        'level'               => 22,
        'speed'               => 1,
        'critical_chance'     => 10,
        'critical_multiplier' => 200,
    ],
    "Hydra Crossbow" => [
        'level'               => 22,
        'speed'               => 0.8,
        'critical_chance'     => 15,
        'critical_multiplier' => 250,
    ],
    "Dragon Slayer" => [
        'level'               => 22,
        'speed'               => 0.6,
        'critical_chance'     => 15,
        'critical_multiplier' => 300,
    ],
];

function getBaseDamage(int $dps, float $attackSpeed, int $criticalChance, int $criticalMultiplier): int
{
    $baseDPS = $dps / (1 + ($criticalChance / 100) * ($criticalMultiplier / 100 - 1));
    return (int)round($baseDPS / $attackSpeed);
}

echo '<table>
        <tr>
            <th>Name</th>
            <th>Level</th>
            <th>DPS</th>
            <th>Damage</th>
            <th>Speed</th>
            <th>Critical chance</th>
            <th>Critical multiplier</th>
        </tr>';

foreach ($crossbows as $name => $stats) {
    $dps = floor(12 + $stats['level'] * 5.3);
    $damage = getBaseDamage($dps, $stats['speed'], $stats['critical_chance'], $stats['critical_multiplier']);
    echo '<tr><td>' . $name . '</td><td>' . $stats['level'] . '</td><td>' . $dps . '</td><td>' . $damage . '</td><td>' . $stats['speed'] . '</td><td>' . $stats['critical_chance'] . '</td><td>' . $stats['critical_multiplier'] . '</td></tr>';
}

echo '</table>';
```


