<?php
$base = '../src/';
$folders = [
		'dao',
		'dto',
		'orm',
		'service', 
		'filter'
];
foreach ($folders as $f)
{
	if($f=='orm'){
		foreach (glob($base . "$f/beans/beans/Map/*.php") as $filename)
		{
			require $filename;
		}
		foreach (glob($base . "$f/beans/beans/Base/*.php") as $filename)
		{
			require $filename;
		}
		foreach (glob($base . "$f/beans/beans/*.php") as $filename)
		{
			require $filename;
		}
	}else if($f=='dao'){
		foreach (glob($base . "$f/*.php") as $filename)
		{
			require $filename;
		}
		foreach (glob($base . "$f/impl/*.php") as $filename)
		{
			require $filename;
		}
	}else {
		foreach (glob($base . "$f/*.php") as $filename)
		{
			require $filename;
		}
	}
}