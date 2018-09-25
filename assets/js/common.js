function formatHomeNewsContent(content) {
  var dummy = $('<div></div>').html(content);
  dummy.find('img').remove();
  content = dummy.text().substr(0, 330);
  return content;
}

function getImageFromContent(content) {
  var dummy = $('<div></div>').html(content);
  return dummy.find('img').first().attr('src') || `${admin_path}assets/images/gallery/default-image.png`;
}
