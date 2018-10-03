var load_people = (data) => {
  var peoplelist = $('.people-columns').find('.people-list');
  if(data.response){
    peoplelist.html('')
    var row = $('<div class="row people-row"></div>');
    $.each(data.data.records, function(index, value){
      row.append(
        $('<div class="col-xs-12 col-md-6 people-item"></div>')
          .append(
            $('<div class="row item-content"></div>')
              .append(
                $('<div class="item-image"></div>')
                  .append(
                      $('<img id="peopleimage" />').attr('src',getImageFromContent(value['content']))
                  )
              )
              .append(
                $('<div class="people-info"></div>')
                  .append(
                    $('<div class="title"></div>')
                      .html(value['title'])
                  )
              )
          )
      );
      peoplelist.append(row);
    });
  }
};

var load_places = (data) => {
  console.log(data);
  var placelist = $('.places-columns').find('.place-list');
  if(data.response){
    placelist.html('')
    var row = $('<div class="row places-row"></div>');
    $.each(data.data.records, function(index, value){
      row.append(
        $('<div class="col-xs-12 col-md-6 place-item"></div>')
          .append(
            $('<div class="row item-content"></div>')
              .append(
                $('<div class="item-image"></div>')
                  .append(
                      $('<img id="peopleimage" />').attr('src',getImageFromContent(value['content']))
                  )
              )
              .append(
                $('<div class="place-info"></div>')
                  .append(
                    $('<div class="title"></div>')
                      .html(value['title'])
                  )
              )
          )
      );
      placelist.append(row);
    });
  }
};

$(function(){
  load_pages(
    // parameters
    {
      'pp': {
        'people': {
          'searchkey': '',
          'start': 0,
          'limit': 4,
          'isShown': 1
        }
      },
    },
    // page slug
    'people_places',
    // js function
    'load_people'
  );

  load_pages(
    // parameters
    {
      'pp': {
        'places': {
          'searchkey': '',
          'start': 0,
          'limit': 4,
          'isShown': 1
        }
      },
    },
    // page slug
    'people_places',
    // js function
    'load_places'
  );
});
