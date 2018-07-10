CKEDITOR.plugins.add('imagebrowser', {
	"init": function (editor) {
		editor.config.filebrowserImageBrowseUrl = '/webadmin/_files.php?t=Image';
		editor.config.filebrowserBrowseUrl = '/webadmin/_files.php?t=File';
	}
});
