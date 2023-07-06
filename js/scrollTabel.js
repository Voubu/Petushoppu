// scrolling tabel

$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-bod').width() - $('.tbl-bod table').width();
  $('.tbl-head').css({'padding-right':scrollWidth});
}).resize();