var load_festival = (data) => {
  console.log(data);
  var festivallist = $('.festival-headline').find('.festival-list');
  if(data.response){
    festivallist.html('');
    var row = $('<div class="row"></div>');
    $.each(data.data.records, function(value,index){
      console.log(data.data.records);
      row.append(
        $('<div class="item-container"></div>')
          .append(
            $('<div class="col-sm-6 festival-image"></div>')
              .append(
                $('<img id="festivalpicture">').attr('src',getImageFromContent(value['content']))
              )
          )
          .append(
            $('<div class="col-sm-6 festival-item"></div>')
              .append(
                $('<div class="festival-title"></div>')
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
                $('<div class="festival-content"></div>')
                  .html(`${formatHomeNewsContent(value['content'])}`)
              )
          )
      );
        festivallist.append(row);
    });
  }
};

$(function(){
  load_pages(
    // parameters
    {
      'fc': {
        'festival': {
          'searchkey': '',
          'start': 0,
          'limit': 4,
          'isShown': 1
        }
      },
    },
    // page slug
    'festival_cuisine',
    // js function
    'load_festival'
  );
});
