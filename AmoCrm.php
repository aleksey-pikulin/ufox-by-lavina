<?php

include_once "src/Client.php";
include_once "src/GetResponseAPI3.class.php";

try {
    $amo = new \AmoCRM\Client('smm0987', 'e.koval@ufox.by', '30ce76fef179fa152f9d866e14a8ce43');
    $account = $amo->account;
    $contact = $amo->contact;
    $contact['name'] = $_POST['form-name'];
    $contact['tags'] = ['Lavina'];
    $contact->addCustomField(1045242, [
        [$_POST['form-phone'], "MOB"]
    ]);
    $contact->addCustomField(1045244, [
        [$_POST['form-email'], "OTHER"]
    ]);
    $contact->apiAdd();

    $getresponse = new GetResponse('2cfa0ea7b69f0f50c0b31b706e2430de');
    $getresponse->addContact(array(
        'name'              => $_POST['name'],
        'email'             => $_POST['email'],
        'dayOfCycle'        => 0,
        'campaign'          => array('campaignId' => 'nJNiz'),
    ));

    header('Location: https://bezkassira.by/3-h_dnevnyi_intensiv_lavina-1908/');
} catch (Exception $e) {
    printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
}