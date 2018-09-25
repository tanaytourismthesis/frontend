var load_news = (searchkey, start, limit, id, slug, status) => {
  $.post(
    `${baseurl}home/load_news`,
    {
      searchkey: searchkey,
      start: start,
      limit: limit,
      id: id,
      slug: slug,
      status: status
    }
  ).done(function(data){
    var news_list = $('.latest-updates').find('.news_list');
    if (data.response) {
      // clear all existing news
      news_list.html('');

      var row = $('<div class="row news-row"></div>');
      $.each(data.data.records, function(index, value) {
        row.append(
          $('<div class="col-xs-12 col-md-6 news-item"></div>')
            .append(
              $('<div class="news-container"></div>')
                .append(
                  $('<div class="news-title"></div>')
                    .html(value['title'])
                )
                .append(
                  $('<div class="row"></div>')
                    .append(
                      $('<span class="col-sm-6 author-name"></span>')
                        .html(`
                          <i class="fas fa-user-circle"></i>&nbsp;
                          ${value['first_name']} ${value['last_name']}
                        `)
                    )
                    .append(
                      $('<span class="col-sm-6 date-posted"></span>')
                        .html(`
                          <i class="far fa-calendar-times"></i>&nbsp;
                          ${value['date_posted']}
                        `)
                    )
                )
                .append(
                  $('<div class="news-content"></div>')
                    .html(`
                      ${formatHomeNewsContent(value['content'])}...
                      <a href="${baseurl}news/${value['slug']}"
                        class="read-more" role="button">read more</a>
                    `)
                )
            )
        );

        if (
            (index+1)%2 === 0 ||
            (index+1) === parseInt(data.data.total_records)
        ) {
          news_list
            .append(row)
            .append(`
              <div class="row divider4 hidden-xs hidden-sm">
                <div class="col-md-6">
                  <hr />
                </div>
                <div class="col-md-6">
                  <hr />
                </div>
              </div>
            `);
          row = $('<div class="row news-row"></div>');
        }
      });
    } else {
      news_list.html('No latest news items.');
    }
  });
}

var load_special = (searchkey, start, limit, id, slug, status, newsslug) => {
  $.post(
    `${baseurl}home/load_special`,
    {
      searchkey: searchkey,
      start: start,
      limit: limit,
      id: id,
      slug: slug,
      status: status,
      newsslug: newsslug
    }
  ).done(function(data){
    var othercolumns = $('.other-columns .popular-items ').find('.item-container');
    // clear all existing news
    othercolumns.find('.column-title').siblings().remove();
    if (data.response) {
      $.each(data.data.records, function(index, value) {
        othercolumns.append(
          $('<div class="row item-content"></div>')
            .append(
              $('<div class="item-image"></div>')
                .append(
                  $('<img id="newspicture" />').attr('src',getImageFromContent(value['content']))
                )
            )
            .append(
              $('<div class="item-info"></div>')
                .append(
                  $('<div class="date"></div>')
                    .html(value['date_posted'])
                )
                .append(
                  $('<div class="title"></div>')
                    .html(value['title'])
                )
            )
            .append(
              $('<div class="row divider6"><hr></div>')
            )
        );

        if (
            (index+1)%2 === 0 ||
            (index+1) === parseInt(data.data.total_records)
        ) {

        }
      });
    } else {
      othercolumns.append('No Announcements');
    }
  });
}

var load_announcements = (searchkey, start, limit, id, slug, status, newsslug) => {
  $.post(
    `${baseurl}home/load_announcements`,
    {
      searchkey: searchkey,
      start: start,
      limit: limit,
      id: id,
      slug: slug,
      status: status,
      newsslug: newsslug
    }
  ).done(function(data){
    var othercolumns = $('.other-columns .public-announcement').find('.item-container');
    // clear all existing news
    othercolumns.find('.column-title').siblings().remove();
    if (data.response) {
      $.each(data.data.records, function(index, value) {
        othercolumns.append(
          $('<div class="row item-content"></div>')
            .append(
              $('<div class="item-image"></div>')
                .append(
                  $('<img id="newspicture" />').attr('src',getImageFromContent(value['content']))
                )
            )
            .append(
              $('<div class="item-info"></div>')
                .append(
                  $('<div class="date"></div>')
                    .html(value['date_posted'])
                )
                .append(
                  $('<div class="title"></div>')
                    .html(value['title'])
                )
            )
            .append(
              $('<div class="row divider6"><hr></div>')
            )
        );

        if (
            (index+1)%2 === 0 ||
            (index+1) === parseInt(data.data.total_records)
        ) {

        }
      });
    } else {
      othercolumns.append('No Announcements');
    }
  });
}

$(function() {
  load_news('',0,4,'','','published');
  load_special('',0,3,'','','published','special-feature');
  load_announcements('',0,3,'','','published','announcements');
});
