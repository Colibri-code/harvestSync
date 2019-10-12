<?php
include 'vendor/autoload.php';

use vipomx\harvestSync\Account;

$accessToken = '1758336.pt.Q_MJtSwyQKZYLO2PPjdqs6daAzTOEpCbjJdbHCpyG1vXQubTkig7mSZmSOU7XO0ECmA4cDw6KKF2yRtFRchtnQ';
$accountID = '141644';

$account = new Account($accessToken,$accountID);
$filters = [
  'from' => '2019-10-01',
  'to' => '2019-10-31'
];
$account = $account->Get('time', $filters);

echo($account);