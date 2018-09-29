var load_history = (params, controller) => {
  $.post(
    `${baseurl}${controller}/load_pages`,
    {
      params: params
    }
  ).done(function(data){
      var historylist = $('.history-updates').find('.history-list-items');
      console.log(data);
      if(data.response){

        historylist.html('');
        var row = $('<div class="row history-row"></div>');
        $.each(data.data.records, function(index, value){
          row.append(
            $('<div class="col-xs-12 col-sm-6 history-item">')
              .append(
                $('<div class="history-container"></div>')
                  .append(
                    $('<div class="history-title"></div>')
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
                  )
                  .append(
                    $('<div class="news-image"></div')
                      .append(
                          $('<img id="news-picture" />').attr('src',getImageFromContent(value['content']))
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
            historylist
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
        })
      }
  });
};

var load_ca = (params, controller) => {
  $.post(
    `${baseurl}${controller}/load_pages`,
    {
      params: params
    }
  ).done(function(data){
    console.log(data);
      var historylist = $('.culture-arts-updates').find('.culture-arts-list');
      if(data.response){

        historylist.html('');
        var row = $('<div class="row history-row"></div>');
        $.each(data.data.records, function(index, value){
          row.append(
            $('<div class="col-xs-12 col-sm-6 history-item">')
              .append(
                $('<div class="history-container"></div>')
                  .append(
                    $('<div class="history-title"></div>')
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
                  )
                  .append(
                    $('<div class="news-image"></div')
                      .append(
                          $('<img id="news-picture" />').attr('src',getImageFromContent(value['content']))
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
            historylist
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
        })
      }
  });
};

$(function(){
  load_pages(
    {
      'hca': {
        'history': {
          'searchkey': '',
          'start': 0,
          'limit': 4,
          'isShown': 1
        },
        'culture': {
          'searchkey': '',
          'start': 0,
          'limit': 4,
          'isShown': 1
        },
      },
    }, 'hca');

    load_history(
      {
        'hca': {
          'history': {
            'searchkey': '',
            'start': 0,
            'limit': 4,
            'isShown': 1
          }
        },
      }, 'hca');

      load_ca(
        {
          'hca': {
            'culture': {
              'searchkey': '',
              'start': 0,
              'limit': 4,
              'isShown': 1
            },
            'arts': {
              'searchkey': '',
              'start': 0,
              'limit': 4,
              'isShown': 1
            },
          },
        }, 'hca');

});
