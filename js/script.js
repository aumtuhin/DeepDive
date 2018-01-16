
document.getElementById("post-tittle").focus();

// initialised tinymce
tinymce.init({
  selector: "textarea.tinymce",

  theme: "modern",
  skin: "lightgray",

  width: "100%",
  height: "250",
  menu: {
        edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
        insert: {title: 'Insert', items: 'link media | template hr'},
        view: {title: 'View', items: 'visualaid'},
        format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},
        table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
        tools: {title: 'Tools', items: 'spellchecker code'}
    }
});
