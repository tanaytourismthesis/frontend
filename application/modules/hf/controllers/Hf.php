<?php
if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class Hf extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('home_model');
	}

  public function index(){
    $data = [
      'err_msg' => $_GET['err_msg'] ?? ''
    ];

    $template = ENV['default_template'];

    $this->template->build_template (
      'Home', //Page Title
      array( // Views
        array(
          'view' => 'hf/hf',
          'data' => $data
        )
      ),
      array( // JavaScript Files
        "assets/js/hanesearch.js"
      ),
      array( // CSS Files
        "assets/css/hane.css"
      ),
      array( // Meta Tags

      ),
      $template // template page
    );
  }

   public function search() {
     $params = $this->input->post();
     $params['search'] = empty($params['search']) ? ' ' : $params['search'];

     $path = ENV['api_path'];
     $api_name = 'hf_management/searchHane';
     $creds = ENV['credentials'];
     $client = new GuzzleHttp\Client(['verify' => FALSE]);

     $url = $path . $api_name;

     $request = $client->request(
       'POST',
       $url,
       array_merge($creds, ['form_params' => $params])
     );

     $res = $request->getBody()->getContents();
     $res = json_decode($res, TRUE);

     if (!$res['response']) {
       $err_msg = urlencode('No results found.');
       redirect('hf?err='.$err_msg);
     }

     $data = [
       'data' => $res['data']
     ];

     $template = ENV['default_template'];

     $this->template->build_template (
       'Home', //Page Title
        array( // Views
         array(
        'view' => 'hf/search',
          'data' => $data
        )
       ),
      array( // JavaScript Files
       "assets/js/searchhotel.js"
      ),
      array( // CSS Files
        "assets/css/search.css"
      ),
       array( // Meta Tags

       ),
       $template // template page
     );
 }

public function hotelinfo($slug = NULL ) {
  $data = [];

  $template = ENV['default_template'];

  $this->template->build_template (
    'Home', //Page Title
     array( // Views
      array(
     'view' => 'hf/hotelinfo',
       'data' => $data
     )
    ),
   array( // JavaScript Files
   ),
   array( // CSS Files
     "assets/css/hotelinfo.css"
   ),
    array( // Meta Tags

    ),
    $template // template page
  );
}
}

?>
