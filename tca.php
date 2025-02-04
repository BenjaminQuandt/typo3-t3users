<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$TCA['tx_t3users_roles'] = array(
    'ctrl' => $TCA['tx_t3users_roles']['ctrl'],
    'interface' => array(
        'showRecordFieldList' => 'name,description'
    ),
    'feInterface' => $TCA['tx_t3users_roles']['feInterface'],
    'columns' => array(
        'name' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:t3users/locallang_db.xml:tx_t3users_roles.name',
            'config' => array(
                'type' => 'input',
                'size' => '40',
                'max' => '150',
                'eval' => 'required',
            )
        ),
        'description' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:t3users/locallang_db.xml:tx_t3users_roles.description',
            'config' => array(
                'type' => 'text',
                'cols' => '40',
                'rows' => '10',
            )
        ),

        'owner' => array( // LOCAL MM-Field
            'exclude' => 1,
            'label' => 'LLL:EXT:t3users/locallang_db.xml:tx_t3users_roles.owner',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'feusers,fegroups',
                'size' => 10,
                'autoSizeMax' => 30,
                'minitems' => 0,
                'maxitems' => 100,
                'MM' => 'tx_t3users_role2owner_mm',
                'MM_match_fields' => array(
                    'tablenames' => 'tx_t3users_role2owner_mm',
                ),
            )
        ),

        'rights' => array( // FOREIGN MM-Field
            'exclude' => 1,
            'label' => 'LLL:EXT:t3users/locallang_db.xml:tx_t3users_rights',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'allowed' => 'tx_t3users_rights',
                'size' => 10,
                'autoSizeMax' => 50,
                'minitems' => 0,
                'maxitems' => 100,
                'foreign_table' => 'tx_t3users_rights',
                'MM' => 'tx_t3users_right2role_mm',
                'MM_foreign_select' => 1,
                'MM_opposite_field' => 'roles',
                'MM_match_fields' => array(
                    'tablenames' => 'tx_t3users_rights',
                ),
            )
        ),
    ),
    'types' => array(
        '0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource, hidden;;1, name, description,
            --div--;LLL:EXT:t3users/locallang_db.xml:tx_t3users_roles.description, rights, owner')
    ),
    'palettes' => array(
    )
);


$TCA['tx_t3users_rights'] = array(
    'ctrl' => $TCA['tx_t3users_rights']['ctrl'],
    'interface' => array(
        'showRecordFieldList' => 'sign,description'
    ),
    'columns' => array(
        'sign' => array(
            'label' => 'LLL:EXT:t3users/locallang_db.xml:tx_t3users_rights.sign',
            'exclude' => '0',
            'config' => array(
                'type' => 'input',
                'size' => '7',
                'max' => '7',
                'eval' => 'int',
                'default' => '0'
            )
        ),
        'description' => array(
            'label' => 'LLL:EXT:t3users/locallang_db.xml:tx_t3users_roles.description',
            'exclude' => '0',
            'config' => array(
                'type' => 'input',
                'size' => '7',
                'max' => '7',
                'eval' => 'int',
                'default' => '0'
            )
        )
    ),
    'types' => array(
        '1' => array(
            'showitem' => 'sign,description'
        )
    ),
);
