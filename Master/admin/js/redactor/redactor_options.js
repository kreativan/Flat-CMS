$(function()
{
	$('#wysiwyg').redactor({
		lang: 'en',
		cleanOnPaste: true,
		linkTooltip: true,
		paragraphize: true,
		imageUpload: 'inc/editor_images.php',
		imageManagerJson: 'inc/data_json.php',
		fileUpload: 'inc/editor_files.php',
		replaceDivs: false,
		autoresize: true,
		minHeight: 500,
		buttonSource: true,
		plugins: ['imagemanager','table']
	});
});