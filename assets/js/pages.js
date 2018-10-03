var load_pages = (params, controller, function_name) => {
  $.post(
    `${baseurl}${controller}/load_pages`,
    {
      params: params
    }
  ).done(function(data){
    window[function_name](data);
  });
};
