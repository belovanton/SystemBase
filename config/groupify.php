<?php
	require dirname(__FILE__).'/../lib/symfony/yaml/sfYaml.php';

	$schema = sfYaml::load(dirname(__FILE__).'/doctrine/schema.yml');
	$perms = $schema['Group']['columns']['permissions']['values'];
	$output = array();
	foreach ($perms as $perm) {
	  if (!strpos($perm, 'organization')) {
		$output['tickets'][$perm] = $perm;
	  } else {
		$output['requisites'][$perm] = $perm;
	  }
	}
	file_put_contents(dirname(__FILE__).'/app/permissions_description.yml', sfYaml::dump($output));
