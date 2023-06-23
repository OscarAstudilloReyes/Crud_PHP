<?php return array(
    'root' => array(
        'name' => '__root__',
        'pretty_version' => 'dev-master',
        'version' => 'dev-master',
        'reference' => 'e9a7b812531a29a77e9e5916dbc980fcf2b5b1bd',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => 'e9a7b812531a29a77e9e5916dbc980fcf2b5b1bd',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'components/jquery' => array(
            'pretty_version' => '3.6.0',
            'version' => '3.6.0.0',
            'reference' => '6cf38ee1fd04b6adf8e7dda161283aa35be818c3',
            'type' => 'component',
            'install_path' => __DIR__ . '/../components/jquery',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'twbs/bootstrap' => array(
            'pretty_version' => 'v5.3.0',
            'version' => '5.3.0.0',
            'reference' => '60098ac499d30aa50575b0b7137391c06ef25429',
            'type' => 'library',
            'install_path' => __DIR__ . '/../twbs/bootstrap',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'twitter/bootstrap' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => 'v5.3.0',
            ),
        ),
    ),
);
