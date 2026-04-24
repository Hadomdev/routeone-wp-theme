jQuery(document).ready(function($) {
  $('.copy-link').click(function(e) {
    e.preventDefault();
    let clicked = $(this);
    var linkHref = $(this).attr('href');
    var tempInput = $('<input>');
    $('body').append(tempInput);
    tempInput.val(linkHref).select();
    
    document.execCommand('copy');
    tempInput.remove();
    $(clicked).addClass('show-notice');
    setTimeout(function(){
      $(clicked).removeClass('show-notice');
    }, 3000);
  });
});