<?php

// custom shortcode [a href="http://www.google.com" onclick="test()" rel="nofollow" title="Click here" name="link"]Click me[/a]
function ahref_func($atts, $content=null) {

	extract( shortcode_atts( array(
		'href' => '',
		'onclick' => '',
		'rel' => '',
		'title' => '',
		'name' => ''
	), $atts ));

	//onclick
	$onclick = "{$onclick}";
	if($onclick){
		$onclickcode = " onclick=\"".$onclick."\"";
	}
	//rel
	$rel = "{$rel}";
	if($rel){
		$relcode = " rel=\"".$rel."\"";
	}
	//title
	$title = "{$title}";
	if($title){
		$titlecode = " title=\"".$title."\"";
	}
	//name
	$name = "{$name}";
	if($name){
		$namecode = " name=\"".$name."\"";
	}
	return "<a href=\"{$href}\"".$onclickcode.$relcode.$titlecode.$namecode." target=\"_blank\">" . $content . "</a>";
}
add_shortcode('a', 'ahref_func' );
