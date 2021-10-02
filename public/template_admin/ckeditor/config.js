/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

// CKEDITOR.editorConfig = function(config) {
//     // Define changes to default configuration here. For example:
//     // config.language = 'fr';
//     // config.uiColor = '#AADC6E';
// };

CKEDITOR.editorConfig = function(config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.htmlEncodeOutput = false;
    config.entities = false;
    config.entities_latin = false;
    config.ForceSimpleAmpersand = true;
    config.enterMode = 2; //disabled <p> completely
    config.autoParagraph = false; // stops automatic insertion of <p> on focus
    config.forcePasteAsPlainText = true;
    config.enterMode = CKEDITOR.ENTER_BR;
    config.shiftEnterMode = CKEDITOR.ENTER_P;
};