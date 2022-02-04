<?php

require_once __DIR__ . '/vendor/autoload.php';

$fromTable = new \Doctrine\DBAL\Schema\Table(
    'test',
    [],
    [],
    [],
    [],
    [
        "create_options" => [],
        "engine"         => "InnoDB",
        "collation"      => "utf8mb4_unicode_ci",
        "charset"        => "utf8mb4",
        "comment"        => "",
    ]
);
$fromTable->addColumn(
    'name',
    \Doctrine\DBAL\Types\Types::STRING,
    [
        'length'          => 255,
        'notnull'         => true,
        'platformOptions' => [
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
        ],
    ]
);

$toTable = new \Doctrine\DBAL\Schema\Table(
    'test',
    [],
    [],
    [],
    [],
    [
        "create_options" => [],
        "collate"        => "utf8mb4_unicode_ci",
        "charset"        => "utf8mb4",
    ]
);
$toTable->addColumn(
    'name',
    \Doctrine\DBAL\Types\Types::STRING,
    [
        'length'          => 255,
        'notnull'         => true,
        'platformOptions' => [
            'version' => false,
        ],
    ]
);

$comparator = new \Doctrine\DBAL\Platforms\MySQL\Comparator(new \Doctrine\DBAL\Platforms\MySQL80Platform());

$diff = $comparator->diffTable($fromTable, $toTable);

if ($diff !== false) {
    throw new \Exception('Diff should be empty');
} else {
    echo 'No diff as expected.';
}

$diff = $comparator->diffTable($toTable, $fromTable);

if ($diff !== false) {
    throw new \Exception('Diff should be empty');
} else {
    echo 'No diff as expected.';
}
