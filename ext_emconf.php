<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "save_close_ce".
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'Save and close button',
    'description' => 'Adds save and close button to all the content elements',
    'category' => 'be',
    'author' => 'Goran Medakovic',
    'author_email' => 'avion.bg@gmail.com',
    'state' => 'stable',
    'uploadfolder' => false,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.2.0',
    'constraints' =>
        [
            'depends' =>
                [
                    'typo3' => '11.5.0-12.4.99',
                ],
            'conflicts' =>
                [],
            'suggests' =>
                [],
        ],
    'clearcacheonload' => false,
    'author_company' => NULL,
];
