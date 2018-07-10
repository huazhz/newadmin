/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.toolbar = 'Full';
	config.toolbar_Full =
	[
		{ name: 'document', items : [ 'Source','-','Maximize','-', 'ShowBlocks','-','DocProps','Preview','Print','-','Templates' ] },
		{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
		
		
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote',
		'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
		'/',
		
		{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert', items : [ 'Image','Table','HorizontalRule','SpecialChar','Flash','Iframe' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
		{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
		{ name: 'colors', items : [ 'TextColor','BGColor' ] }
	];
	config.extraPlugins = 'imagebrowser';
	config.allowedContent = true;
	
	config.font_names = 'Roboto Slab, serif;' +
	'Source Sans Pro, sans-serif;' +
	'Arial/Arial, Helvetica, sans-serif;' +
    'Comic Sans MS/Comic Sans MS, cursive;' +
    'Courier New/Courier New, Courier, monospace;' +
    'Georgia/Georgia, serif;' +
    'Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif;' +
    'Tahoma/Tahoma, Geneva, sans-serif;' +
    'Times New Roman/Times New Roman, Times, serif;' +
    'Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;' +
    'Verdana/Verdana, Geneva, sans-serif;';
    
};
