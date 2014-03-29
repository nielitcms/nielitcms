/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
// 	config.toolbarGroups = [
//     { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
//     { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
//     { name: 'links' },
//     { name: 'insert' },
//     { name: 'forms' },
//     { name: 'tools' },
//     { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] },
//     { name: 'others' },
//     '/',
//     { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
//     { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
//     { name: 'styles' },
//     { name: 'colors' },
//     { name: 'about' }
// ];
	config.skin = 'bootstrapck';
	config.extraPlugins = 'autogrow';
	config.disableNativeSpellChecker = false;
	config.toolbarCanCollapse = true;
	config.toolbarStartupExpanded = false;
	config.autoGrow_onStartup = true;
	config.autoGrow_maxHeight = 500;
	config.autoGrow_minHeight = 100;
	config.toolbarGroups = [
		{ name: 'document',    groups: [ 'mode', 'document', 'doctools' ] },
	    { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
	    { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
	    { name: 'forms' },
	    '/',
	    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
	    { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
	    { name: 'links' },
	    { name: 'insert' },
	    '/',
	    { name: 'styles' },
	    { name: 'colors' },
	    { name: 'tools' },
	    { name: 'others' },
	    { name: 'about' }
	];
};
