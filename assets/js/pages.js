var load_pages = (params, controller) => {
  $.post(
    `${baseurl}${controller}/load_pages`,
    {
      params: params
    }
  ).done(function(data){
    // console.log(data);
  });
};
