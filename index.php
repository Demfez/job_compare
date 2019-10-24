<?php

$i_have ='bike|driver license';

$companies = [
    [
        'name' => 'A',
        'requires' => [
            'apartment or house',
            'property insurance'
        ]
    ],
    [
        'name' => 'B',
        'requires' => [
            '5 door or 4 door car',
            'driver license',
            'car insurance'
        ]
    ],
    [
        'name' => 'C',
        'requires' => [
            'bike',
            'driver license'
        ]
    ],
    [
        'name' => 'D',
        'requires' => [
            'scooter or bike',
            'driver license'
        ]
    ],
    [
        'name' => 'E',
        'requires' => [
            'PayPal account'
        ]
    ]
];

$success_companies = [];
$failure_companies = [];

foreach ($companies as $company){
    //this is what we already have for current company
    $result = preg_grep('/'.$i_have.'/i', $company['requires']);

    //what we need for this campaign
    $current_company = array_diff($company['requires'], $result);
    if(empty($current_company)){
        array_push($success_companies, $company);
    }else{
        $company['requires'] = $current_company;
        array_push($failure_companies, $company);

    }

}

//just information for user
echo '<h2>This companies waiting for your CV:</h2> <br>';
foreach($success_companies as $v){
    echo $v['name'] . '<br>';
}

echo '<hr>';

echo '<h2>You need some stuff to get this job:</h2> <br>';

foreach($failure_companies as $v){
    echo 'For campaign ' . $v['name'] . ' you should get :';
    echo '<ul>';
    foreach ($v['requires'] as $require){
        echo '<li>'.$require.'</li>';
    }
    echo '</ul>';
}
