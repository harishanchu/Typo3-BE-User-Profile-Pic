<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}
$tempColumns = array(
	'tx_beuserprofilepic_profile_pic' => array(		
		'exclude' => 0,		
		'label' => 'LLL:EXT:be_user_profilepic/locallang_db.xml:be_users.tx_beuserprofilepic_profile_pic',		
		'config' => array(
			'type' => 'group',
			'internal_type' => 'file',
			'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],	
			'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],	
			'uploadfolder' => 'uploads/tx_beuserprofilepic',
			'show_thumbs' => 1,	
			'size' => 1,	
			'minitems' => 0,
			'maxitems' => 1,
		)
	),
);


t3lib_div::loadTCA('be_users');
t3lib_extMgm::addTCAcolumns('be_users',$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes('be_users','tx_beuserprofilepic_profile_pic;;;;1-1-1');


if (TYPO3_MODE === 'BE')	{
	t3lib_extMgm::insertModuleFunction(
		'user_task',		
		'tx_beuserprofilepic_modfunc1',
		t3lib_extMgm::extPath($_EXTKEY).'modfunc1/class.tx_beuserprofilepic_modfunc1.php',
		'LLL:EXT:be_user_profilepic/locallang_db.xml:moduleFunction.tx_beuserprofilepic_modfunc1'
	);
}
?>