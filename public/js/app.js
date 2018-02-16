document.addEventListener("turbolinks:load", function() {
  tinymce.init({
      selector: '#tex',
      menubar: true,
      height:300,
      plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code',
          'insertdatetime media table contextmenu paste code'
      ],
      toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
  });
})
