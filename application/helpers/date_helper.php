<?php

function formatDate( $date, $type = 'd/m/Y H:i:s' ){
	if( ! $date )
		return '';

	$dt = new DateTime( $date );
	return $dt->format( $type );
}

function date2bd( $date ){
	list($d, $m, $y) = explode('/', $date);
	
	return $y . '-' . $m . '-' . $d;
}