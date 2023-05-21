$(document).ready(function() {
    $('.summernote').summernote();
});

$('.desc').summernote({
  placeholder: "Please enter the description neatly",
  tabsize: 2,
  height: 120,
  toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video']],
    ['view', ['fullscreen', 'codeview', 'help']]
  ]
});

$('.inst').summernote({
  placeholder: "Please enter the instruction neatly in sequence (1., 2., 3., etc.)",
  tabsize: 2,
  height: 120,
  toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video']],
    ['view', ['fullscreen', 'codeview', 'help']]
  ]
});

$('.ingr').summernote({
  placeholder: "Please enter the ingredients neatly",
  tabsize: 2,
  height: 120,
  toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video']],
    ['view', ['fullscreen', 'codeview', 'help']]
  ]
});