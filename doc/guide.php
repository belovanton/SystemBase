<?php

function style($arg1, $arg2 = null) {
	$local = 10;
	if ($local || $arg1) {
		echo $arg2;
	}
	
	foreach (range(1, 100) as $num) {
		${'var'.$num} = true;
	}
	
	if (
		$num1
			||
		$num2
			||
		$num3 && $num4
	) {
		echo 'Hello', $num1, 'world';
	}
	
	$result = Doctrine_Query::create()
		->select('u.id')
		->where('u.name = ?', 'Vassilliy')
		->andWhere('u.surname = ?', 'Poupkin')
		->execute();
}
