<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}
$ll = 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:';
$linkWizardConfig = [
    'type' => 'popup',
    'title' => $ll . 'button.openLinkWizard',
    'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_link.gif',
    'module' => [
        'name' => 'wizard_link',
        'urlParameters' => [
            'mode' => 'wizard'
        ],
    ],
    'JSopenParams' => 'height=600,width=500,status=0,menubar=0,scrollbars=1'
];
$versionNumber = \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_version);

if ($versionNumber < 7000000) {
    $editWizardIconPath = 'edit2.gif';
    $addWizardIconPath = 'add.gif';

    $linkWizardConfig = [
        'type' => 'popup',
        'title' => 'LLL:EXT:cms/locallang_ttc.xlf:header_link_formlabel',
        'icon' => 'link_popup.gif',
        'module' => [
            'name' => 'wizard_element_browser',
            'urlParameters' => [
                'mode' => 'wizard'
            ]
        ],
        'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
    ];
}

return [
	'ctrl' => [
		'title' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance',
		'label' => 'date',
		'label_alt' => 'event_location',
		'label_alt_force' => 1,
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
			'fe_group' => 'fe_group'
        ],
		'searchFields' => 'date,admission,begin,end,status_info,external_provider_link,additional_link,provider_type,image,plan,no_handling_fee,price_notice,event_location,ticket_class,status,',
		'iconfile' => 'EXT:t3events/Resources/Public/Icons/tx_t3events_domain_model_performance.gif'
    ],
	'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource,
			hidden, date,end_date,admission, begin, end, status_info, external_provider_link,
			additional_link, provider_type, image, images, plan, no_handling_fee, price_notice,
			event_location, ticket_class, status,fe_group',
    ],
	'types' => [
		'0' => ['showitem' => '
		--palette--;;1,
        --palette--;;paletteTitle,
        --palette--;;paletteTime,
        status, status_info,
        --div--;' . $ll . 'tx_t3events_domain_model_event.tab.relations,
            images, image,
        --div--;Links,provider_type, external_provider_link,additional_link,
        --div--;Tickets,
            --palette--;;paletteTicketsHead,
             no_handling_fee, ticket_class,
        --div--;Access,hidden,starttime, endtime,fe_group'
		],
	],
	'palettes' => [
		'1' => ['showitem' => 'sys_language_uid,l10n_parent,l10n_diffsource'],
		'paletteTitle' => [
			'showitem' => 'date, end_date, event_location',
			'canNotCollapse' => TRUE,
        ],
		'paletteTime' => [
			'showitem' => 'admission, begin, end',
			'canNotCollapse' => TRUE,
        ],
		'paletteTicketsHead' => [
			'showitem' => 'plan,price_notice,',
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
				'foreign_table' => 'tx_t3events_domain_model_performance',
				'foreign_table_where' => 'AND tx_t3events_domain_model_performance.pid=###CURRENT_PID### AND tx_t3events_domain_model_performance.sys_language_uid IN (-1,0)',
				'showIconTable' => false,
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
		'fe_group' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.fe_group',
			'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
				'size' => 5,
				'maxitems' => 20,
				'items' => [
					[
						'LLL:EXT:lang/locallang_general.xml:LGL.hide_at_login',
						-1,
					],
					[
						'LLL:EXT:lang/locallang_general.xml:LGL.any_login',
						-2,
					],
					[
						'LLL:EXT:lang/locallang_general.xml:LGL.usergroups',
						'--div--',
					],
				],
				'exclusiveKeys' => '-1,-2',
				'foreign_table' => 'fe_groups',
				'foreign_table_where' => 'ORDER BY fe_groups.title',
			],
		],
		'date' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance.date',
			'config' => [
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'checkbox' => 1,
				'default' => strtotime('today')
            ],
        ],
		'end_date' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance.endDate',
			'config' => [
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'checkbox' => 1,
				'default' => strtotime('today')
			]
		],
		'admission' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance.admission',
			'config' => [
				'type' => 'input',
				'size' => 4,
				'eval' => 'time',
				'checkbox' => 1,
            ],
        ],
		'begin' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance.begin',
			'config' => [
				'type' => 'input',
				'size' => 4,
				'eval' => 'time',
				'checkbox' => 1,
            ],
        ],
		'end' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance.end',
			'config' => [
				'type' => 'input',
				'size' => 4,
				'eval' => 'time',
				'checkbox' => 1,
            ],
        ],
		'status_info' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance.status_info',
			'config' => [
				'type' => 'text',
				'columns' => 30,
				'rows' => 5,
				'eval' => 'trim',
            ],
        ],
		'external_provider_link' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance.external_provider_link',
            'config' => [
                'type' => 'input',
                'softref' => 'typolink',
                'wizards' => [
                    '_PADDING' => 2,
                    'link' => $linkWizardConfig
                ]
            ]
        ],
		'additional_link' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance.additional_link',
            'config' => [
                'type' => 'input',
                'softref' => 'typolink',
                'wizards' => [
                    '_PADDING' => 2,
                    'link' => $linkWizardConfig
                ]
            ]
        ],
		'provider_type' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance.provider_type',
			'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
				'items' => [
					['LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance.internal', 0],
					['LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance.external', 1],
                ],
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
            ],
        ],
		'image' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance.image',
			'config' => [
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_t3events',
				'show_thumbs' => 1,
				'size' => 1,
				'maxitems' => 1,
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'disallowed' => '',
				'disable_controls' => '',
            ],
        ],
        'images' => [
            'label' => $ll . 'tx_t3events_domain_model_performance.images',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('images', [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                ],
                // custom configuration for displaying fields in the overlay/reference table
                // to use the imageoverlayPalette instead of the basicoverlayPalette
                'foreign_types' => [
                    '0' => [
                        'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                        'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                        'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                        'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.audioOverlayPalette;audioOverlayPalette,
                            --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                        'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.videoOverlayPalette;videoOverlayPalette,
                            --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                        'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                    ]
                ]
            ], $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'])
        ],
		'plan' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance.plan',
			'config' => [
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_t3events',
				'show_thumbs' => 1,
				'size' => 1,
				'maxitems' => 1,
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'disallowed' => '',
				'disable_controls' => '',
            ],
        ],
		'no_handling_fee' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance.no_handling_fee',
			'config' => [
				'type' => 'check',
				'default' => 0
            ],
        ],
		'price_notice' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance.price_notice',
			'config' => [
				'type' => 'text',
				'columns' => 20,
				'rows' => 3,
				'eval' => 'trim',
            ],
        ],
		'event_location' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance.event_location',
			'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
				'items' => [
					['', 0],
                ],
				'foreign_table' => 'tx_t3events_domain_model_eventlocation',
				'foreign_table_where' => ' AND tx_t3events_domain_model_eventlocation.sys_language_uid IN (-1,0)
                							ORDER BY tx_t3events_domain_model_eventlocation.name',
				'minitems' => 0,
				'maxitems' => 1,
				'showIconTable' => false,
            ],
        ],
		'ticket_class' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance.ticket_class',
			'config' => [
				'type' => 'inline',
				'foreign_table' => 'tx_t3events_domain_model_ticketclass',
				'foreign_field' => 'performance',
				'foreign_sortby' => 'sorting',
				'maxitems' => 9999,
				'appearance' => [
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
                ],
            ],
        ],
		'status' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_performance.status',
			'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
				'l10nmode' => 'mergeIfNotBlank',
				'items' => [
					['', 0],
                ],
				'foreign_table' => 'tx_t3events_domain_model_performancestatus',
				'foreign_table_where' => ' AND (tx_t3events_domain_model_performancestatus.sys_language_uid IN (0,-1)) AND (tx_t3events_domain_model_performancestatus.hidden = 0) ORDER BY tx_t3events_domain_model_performancestatus.priority',
				'showIconTable' => false,
            ],
        ],
		'event' => [
			'config' => [
				'type' => 'passthrough',
				'foreign_table' => 'tx_t3events_domain_model_event'
            ],
        ],
    ],
];
