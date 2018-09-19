function formatHomeNewsContent(content) {
  var dummy = $('<div></div>').html(content);
  dummy.find('img').remove();
  content = dummy.text().substr(0, 500);
  return content;
}
