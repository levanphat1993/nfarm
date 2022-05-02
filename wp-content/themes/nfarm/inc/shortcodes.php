<?php

/*
	
@package nfarmtheme
	
	========================
		SHORTCODE OPTIONS
	========================
*/

function nfarm_tooltip($atts, $content = null)
{
	
	//[tooltip placement="top" title="This is the title"]This is the content[/tooltip]
	
	//get the attributes
	$atts = shortcode_atts(
		array(
			'placement' => 'top',
			'title' => '',
		),
		$atts,
		'tooltip'
	);
	
	$title = ( $atts['title'] == '' ? $content : $atts['title'] );
	
	//return HTML
	return '<span class="nfarm-tooltip" data-toggle="tooltip" data-placement="' . $atts['placement'] . '" title="' . $title . '">' . $content . '</span>';
	
}

add_shortcode('tooltip', 'nfarm_tooltip');

function nfarm_popover( $atts, $content = null )
{
	
	//[popover title="Popover title" placement="top" trigger="click" content="This is the Popover content"]This is the clickable content[/popover]
	
	//get the attributes
	$atts = shortcode_atts(
		array(
			'placement' => 'top',
			'title' => '',
			'trigger' => 'click',
			'content' => '',
		),
		$atts,
		'popover'
	);
	
	//return HTML
	return '<span class="nfarm-popover" data-toggle="popover" data-placement="' . $atts['placement'] . '" title="' . $atts['title'] . '" data-trigger="' . $atts['trigger'] . '" data-content="' . $atts['content'] . '">' . $content . '</span>';
		
}

add_shortcode('popover', 'nfarm_popover');