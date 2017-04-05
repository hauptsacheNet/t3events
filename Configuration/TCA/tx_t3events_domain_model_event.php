<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}
$ll = 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:';
$editWizardIconPath = 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif';
$addWizardIconPath = 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_add.gif';
$versionNumber = \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_version);
if ($versionNumber < 7000000) {
    $editWizardIconPath = 'edit2.gif';
    $addWizardIconPath = 'add.gif';
}

return [
	'ctrl' => [
		'title' => $ll . 'tx_t3events_domain_model_event',
		'label' => 'headline',
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
			'fe_group' => 'fe_group',
		],
		'searchFields' => 'headline,subtitle,teaser,description,keywords,image,genre,venue,event_type,performances,organizer,',
		'iconfile' => 'EXT:t3events/Resources/Public/Icons/tx_t3events_domain_model_event.gif'
	],
	'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, headline,
			subtitle,teaser,description, keywords, image, images, files, related, genre, venue, event_type, performances, organizer,audience,new_until,archive_date,fe_group',
	],
	'types' => [
		'1' => [
			'showitem' => '
			    	 event_type,headline, subtitle,teaser,description,
			    	 --div--;' . $ll . 'tx_t3events_domain_model_event.tab.relations,
			    	    images, image, files, related,
			    	 --div--;LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_event.extended,
			    	 sys_language_uid,audience,organizer, genre, venue, keywords,
			    	 --div--;LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tx_t3events_domain_model_event.performances,
			    	 performances,
			    	 --palette--;;paletteSys,
			    	 --div--;LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tab.access,new_until,archive_date,hidden,starttime,endtime,fe_group'],
	],
	'palettes' => [
		'paletteSys' => [
		    'showitem' => 'l10n_parent, l10n_diffsource'
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
				'foreign_table' => 'tx_t3events_domain_model_event',
				'foreign_table_where' => 'AND tx_t3events_domain_model_event.pid=###CURRENT_PID### AND tx_t3events_domain_model_event.sys_language_uid IN (-1,0)',
				'showIconTable' => TRUE,
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
		'headline' => [
			'exclude' => 0,
			'label' => $ll . 'tx_t3events_domain_model_event.headline',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			],
		],
		'subtitle' => [
			'exclude' => 0,
			'label' => $ll . 'tx_t3events_domain_model_event.subtitle',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			],
		],
		'teaser' => [
			'exclude' => 1,
			'label' => $ll . 'tx_t3events_domain_model_event.teaser',
			'config' => [
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
				'eval' => 'trim'
			],
		],
		'description' => [
			'exclude' => 0,
			'label' => $ll . 'tx_t3events_domain_model_event.description',
			'config' => [
				'type' => 'text',
				'cols' => 32,
				'rows' => 10,
				'eval' => 'trim'
			],
			'defaultExtras' => 'richtext[]:rte_transform[mode=ts_links]'
		],
		'keywords' => [
			'exclude' => 0,
			'label' => $ll . 'tx_t3events_domain_model_event.keywords',
			'config' => [
				'type' => 'text',
				'cols' => 32,
				'rows' => 5,
				'eval' => 'trim'
			],
		],
		'image' => [
			'exclude' => 1,
			'label' => $ll . 'tx_t3events_domain_model_event.image',
			'config' => [
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_t3events',
				'show_thumbs' => 1,
				'size' => 1,
				'maxitems' => 1,
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'disallowed' => '',
			],
		],
        'images' => [
            'label' => $ll . 'tx_t3events_domain_model_event.images',
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
        'files' => [
            'label' => $ll . 'tx_t3events_domain_model_event.files',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('files', [
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
        'related'  => [
            'label' => $ll . 'tx_t3events_domain_model_event.related',
            'config' => [
                'type' => 'select',
                'noIconsBelowSelect' => '1',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_t3events_domain_model_event',
                'foreign_table_where' => 'AND tx_t3events_domain_model_event.deleted != 1 AND tx_t3events_domain_model_event.sys_language_uid=###REC_FIELD_sys_language_uid### AND tx_t3events_domain_model_event.uid != ###THIS_UID###',
                'MM' => 'tx_t3events_event_event_mm',
                'MM_match_fields' => array('foreign_field' => 'related'),
                'MM_insertfields' => array('foreign_field' => 'related'),
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 100,
                'multiple' => 0,
                'enableMultiSelectFilterTextfield' => true,
                'wizards' => [
                    '_POSITION' => 'top',
                    '_VERTICAL' => 0,
                    'suggest' => [
                        'type' => 'suggest',
                        'default' => [
                            'additionalSearchFields' => 'headline',
                        ],
                    ],
                ],
            ],
        ],
		'genre' => [
			'exclude' => 1,
			'label' => $ll . 'tx_t3events_domain_model_event.genre',
			'config' => [
				'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_t3events_domain_model_genre',
				'MM' => 'tx_t3events_event_genre_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => [
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => [
						'type' => 'popup',
						'title' => 'Edit',
						'module' => [
							'name' => 'wizard_edit',
						],
						'icon' => $editWizardIconPath,
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
					],
					'add' => [
						'type' => 'script',
						'title' => 'Create new',
						'icon' => $addWizardIconPath,
						'params' => [
							'table' => 'tx_t3events_domain_model_genre',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						],
						'module' => [
							'name' => 'wizard_add',
						],
					],
				],
			],
		],
		'venue' => [
			'exclude' => 0,
			'label' => $ll . 'tx_t3events_domain_model_event.venue',
			'config' => [
				'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_t3events_domain_model_venue',
				'MM' => 'tx_t3events_event_venue_mm',
				'size' => 5,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
			],
		],
		'event_type' => [
			'exclude' => 0,
			'label' => $ll . 'tx_t3events_domain_model_event.event_type',
			'config' => [
				'type' => 'select',
                'renderType' => 'selectSingle',
				'foreign_table' => 'tx_t3events_domain_model_eventtype',
				'minitems' => 0,
				'maxitems' => 1,
				'showIconTable' => TRUE,
			],
		],
		'performances' => [
			'exclude' => 0,
			'label' => $ll . 'tx_t3events_domain_model_event.performances',
			'config' => [
				'type' => 'inline',
				'foreign_table' => 'tx_t3events_domain_model_performance',
				'foreign_field' => 'event',
				'maxitems' => 9999,
				'appearance' => [
					'expandSingle' => 1,
					'levelLinksPosition' => 'bottom',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1,
					'newRecordLinkAddTitle' => 1,
					'useSortable' => 1,
					'enabledControls' => [
						'info' => FALSE,
					],
				],
				'showIconTable' => TRUE,
			],
		],
		'organizer' => [
			'exclude' => 0,
			'label' => $ll . 'tx_t3events_domain_model_event.organizer',
			'l10n_mode' => 'mergeIfNotBlank',
			'config' => [
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_t3events_domain_model_organizer',
				'l10nmode' => 'mergeIfNotBlank',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'show_thumbs' => 1,
				'wizards' => [
					'suggest' => [
						'type' => 'suggest',
					],
				],
			],
		],
		'audience' => [
			'exclude' => 1,
			'label' => $ll . 'tx_t3events_domain_model_audience',
			'config' => [
				'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_t3events_domain_model_audience',
				'MM' => 'tx_t3events_event_audience_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => [
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => [
						'type' => 'popup',
						'title' => 'Edit',
						'module' => [
							'name' => 'wizard_edit'
						],
						'icon' => $editWizardIconPath,
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
					],
					'add' => [
						'type' => 'script',
						'title' => 'Create new',
						'icon' => $addWizardIconPath,
						'params' => [
							'table' => 'tx_t3events_domain_model_audience',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						],
						'module' => [
							'name' => 'wizard_add'
						]
					],
				],
			],
		],
		'new_until' => [
			'exclude' => 1,
			'label' => $ll . 'tx_t3events_domain_model_event.new_until',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => 0
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly'
		],
		'archive_date' => [
			'exclude' => 1,
			'label' => $ll . 'tx_t3events_domain_model_event.archive_date',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'date',
                'default' => 0
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly'
		],
	],
];
