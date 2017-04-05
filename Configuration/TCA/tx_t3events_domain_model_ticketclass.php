<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

return [
	'ctrl' => [
		'title' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_ticketclass',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => [
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
        ],
		'searchFields' => 'title,color,price,type,',
		'iconfile' => 'EXT:t3events/Resources/Public/Icons/tx_t3events_domain_model_ticketclass.gif'
    ],
	'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, color, price, type',
    ],
	'types' => [
		'1' => ['showitem' => '
        --palette--;;paletteSys,
        --palette--;;paletteTitle,
        --palette--;;palettePrices,
        --div--;LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tab.access,starttime, endtime'],
    ],
	'palettes' => [
		'paletteSys' => [
			'showitem' => 'sys_language_uid,l10n_parent, l10n_diffsource,hidden',
        ],
		'paletteTitle' => [
			'showitem' => 'color,title',
			'canNotCollapse' => TRUE,
        ],
		'palettePrices' => [
			'showitem' => 'price,type',
			'canNotCollapse' => TRUE,
        ],
    ],
	'columns' => [
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ],
                ],
                'default' => 0,
            ]
        ],
		'l10n_parent' => [
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
				'items' => [
					['', 0],
                ],
				'foreign_table' => 'tx_t3events_domain_model_ticketclass',
				'foreign_table_where' => 'AND tx_t3events_domain_model_ticketclass.pid=###CURRENT_PID### AND tx_t3events_domain_model_ticketclass.sys_language_uid IN (-1,0)',
            ],
        ],
		'l10n_diffsource' => [
			'config' => [
				'type' => 'passthrough',
            ],
        ],
		't3ver_label' => [
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'max' => 255,
            ]
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
            ]
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => 0
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly'
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ]
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly'
        ],
		'title' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_ticketclass.title',
			'config' => [
				'type' => 'input',
				'size' => 10,
				'eval' => 'trim'
            ],
        ],
		'color' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_ticketclass.color',
			'config' => [
				'type' => 'input',
				'size' => 4,
				'eval' => 'trim',
				'wizards' => [
					'colorpick' => [
						'type' => 'colorbox',
						'title' => 'Color picker',
						'module' => [
							'name' => 'wizard_colorpicker',
                        ],
						'dim' => '20x20',
						'tableStyle' => 'border: solid 1px #EEEEE; margin-left:20px',
						'JSopenParams' => 'height=550,width=365,status=0,menubar=0,scrollbars=1',
                    ]
                ],
            ],
        ],
		'price' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_ticketclass.price',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'double2'
            ],
        ],
		'type' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_ticketclass.type',
			'config' => [
				'type' => 'radio',
				'items' => [
					['LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_ticketclass.normal', 0],
					['LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_ticketclass.reduced', 1],
					['LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_ticketclass.special', 2],
                ],
				'default' => 0,
            ],
        ],
		'performance' => [
			'config' => [
				'type' => 'passthrough',
            ],
        ],
    ],
];
