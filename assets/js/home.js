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

$(function() {
  load_news('',0,4,'','','');
});
