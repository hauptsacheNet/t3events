<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}
$ll = 'LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:';

return [
	'ctrl' => [
		'title' => $ll . 'tx_t3events_domain_model_task',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

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
        'requestUpdate' => 'action,period',
		'searchFields' => 'name,action,old_status,new_status,folder,',
		'iconfile' => 'EXT:t3events/Resources/Public/Icons/tx_t3events_domain_model_task.png'
    ],
	'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden,
			name, description, action, period, period_duration, old_status, new_status, folder',
    ],
	'types' => [
		'1' => [
		    'showitem' => '--palette--;;1,
			name, description, action, period, period_duration, old_status, new_status,
			folder,--div--;LLL:EXT:t3events/Resources/Private/Language/locallang_db.xlf:tab.access,starttime, endtime'
        ],
	],
	'palettes' => [
		'1' => [
		    'showitem' => 'sys_language_uid,l10n_parent,l10n_diffsource,hidden'
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
				'foreign_table' => 'tx_t3events_domain_model_task',
				'foreign_table_where' => 'AND tx_t3events_domain_model_task.pid=###CURRENT_PID### AND tx_t3events_domain_model_task.sys_language_uid IN (-1,0)',
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
		'name' => [
			'exclude' => 0,
			'label' => $ll . 'tx_t3events_domain_model_task.name',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'required,trim'
            ],
        ],
		'description' => [
			'exclude' => 0,
			'label' => $ll . 'tx_t3events_domain_model_task.description',
			'config' => [
				'type' => 'text',
				'size' => 30,
				'eval' => ''
            ],
        ],
		'action' => [
			'exclude' => 0,
			'label' => $ll . 'tx_t3events_domain_model_task.action',
			'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
				'items' => [
					[$ll . 'tx_t3events_domain_model_task.action.none', \DWenzel\T3events\Domain\Model\Task::ACTION_NONE],
					[$ll . 'tx_t3events_domain_model_task.action.updateStatus', \DWenzel\T3events\Domain\Model\Task::ACTION_UPDATE_STATUS],
					['delete', \DWenzel\T3events\Domain\Model\Task::ACTION_DELETE],
					[$ll . 'tx_t3events_domain_model_task.action.hidePerformance', \DWenzel\T3events\Domain\Model\Task::ACTION_HIDE_PERFORMANCE],
                ],
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
            ],
        ],
        'period' => [
            'exclude' => 0,
            'label' => $ll . 'label.period',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', ''],
                    [$ll . 'label.period.all', \DWenzel\T3events\Domain\Repository\PeriodConstraintRepositoryInterface::PERIOD_ALL],
                    [$ll . 'label.period.past', \DWenzel\T3events\Domain\Repository\PeriodConstraintRepositoryInterface::PERIOD_PAST],
                    [$ll . 'label.period.future', \DWenzel\T3events\Domain\Repository\PeriodConstraintRepositoryInterface::PERIOD_FUTURE],
                    [$ll . 'label.period.specific', \DWenzel\T3events\Domain\Repository\PeriodConstraintRepositoryInterface::PERIOD_SPECIFIC]
                ],
                'size' => 1,
                'maxitems' => 1,
            ],
        ],
		'period_duration' => [
			'exclude' => 0,
			'label' => $ll . 'label.period_duration',
			'config' => [
				'type' => 'input',
				'size' => 5,
				'eval' => 'int',
            ],
			'displayCond' => 'FIELD:period:=:' . \DWenzel\T3events\Domain\Repository\PeriodConstraintRepositoryInterface::PERIOD_SPECIFIC,
        ],
		'old_status' => [
			'exclude' => 0,
			'label' => $ll . 'tx_t3events_domain_model_task.old_status',
			'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
				'foreign_table' => 'tx_t3events_domain_model_performancestatus',
				'size' => 1,
				'maxitems' => 1,
				'eval' => '',
				'showIconTable' => false,
            ],
			'displayCond' => 'FIELD:action:=:1',
        ],
		'new_status' => [
			'exclude' => 0,
			'label' => $ll . 'tx_t3events_domain_model_task.new_status',
			'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
				'foreign_table' => 'tx_t3events_domain_model_performancestatus',
				'size' => 1,
				'maxitems' => 1,
				'eval' => '',
				'showIconTable' => false,
            ],
			'displayCond' => 'FIELD:action:=:1',
        ],
		'folder' => [
			'exclude' => 0,
			'label' => $ll . 'tx_t3events_domain_model_task.folder',
			'config' => [
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'pages',
				'size' => 5,
				'minitems' => 0,
				'maxitems' => 9999,
				'wizards' => [
					'suggest' => [
						'type' => 'suggest',
                    ],
                ],
            ],
        ],
    ],
];
