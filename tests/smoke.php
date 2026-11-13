<?php

function check($condition, $message)
{
    if (!$condition) {
        fwrite(STDERR, $message . "\n");
        exit(1);
    }
}

check(PHP_VERSION === getenv('EXPECTED_PHP_VERSION'), 'PHP must match the freshly pulled parent');
check(extension_loaded('sqlsrv'), 'sqlsrv must load');
check(extension_loaded('pdo_sqlsrv'), 'pdo_sqlsrv must load');
check(in_array('sqlsrv', PDO::getAvailableDrivers(), true), 'PDO must register sqlsrv');

// No database is required: exercise the native driver, not just PHP module loading.
$connection = sqlsrv_connect('127.0.0.1,1', [
    'UID' => 'invalid',
    'PWD' => 'invalid',
    'LoginTimeout' => 1,
]);
check($connection === false, 'Connection to an unused loopback port must fail');
$errors = sqlsrv_errors(SQLSRV_ERR_ERRORS);
check(is_array($errors) && count($errors) > 0, 'sqlsrv must report connection errors');
foreach ($errors as $error) {
    check(in_array($error['SQLSTATE'], ['HYT00', '08001'], true), json_encode($error));
    check(strpos($error['message'], '[ODBC Driver 17 for SQL Server]') !== false, json_encode($error));
}

try {
    new PDO('sqlsrv:Server=127.0.0.1,1;LoginTimeout=1', 'invalid', 'invalid');
    check(false, 'PDO connection to an unused loopback port must fail');
} catch (PDOException $error) {
    check(in_array($error->getCode(), ['HYT00', '08001'], true), $error->getMessage());
    check(strpos($error->getMessage(), '[ODBC Driver 17 for SQL Server]') !== false, $error->getMessage());
}

echo 'PHP ', PHP_VERSION, '; sqlsrv ', phpversion('sqlsrv'),
    '; pdo_sqlsrv ', phpversion('pdo_sqlsrv'), "; native driver smoke checks passed\n";
