<?php
global $db_prefix, $smcFunc, $sourcedir, $subforum_tree;
global $boardurl, $cookiename, $mbname, $language, $boarddir;

$SSI_INSTALL = false;
if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
{
	$SSI_INSTALL = true;
	require_once(dirname(__FILE__) . '/SSI.php');
}
elseif (!defined('SMF')) // If we are outside SMF and can't find SSI.php, then throw an error
	die('<b>Error:</b> Cannot install - please verify you put this file in the same place as SMF\'s SSI.php.');
require_once($sourcedir.'/Subs-Admin.php');

if (!isset($modSettings['censor_whole']))
{
	$censor_whole = array();
	$censor_vulgar = explode("\n", $modSettings['censor_vulgar']);
	$empty = empty($modSettings['censorWholeWord']) ? 0 : 1;
	foreach ($censor_vulgar as $id => $word)
		$censor_whole[$id] = $empty;
	updateSettings(array('censor_whole' => implode("\n", $censor_whole)));
}

// Echo that we are done if necessary:
if ($SSI_INSTALL)
	echo 'DB Changes should be made now...';
?>