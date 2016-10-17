<?php  

/**
* 
*/
class CoreUploading
{
     protected 
         $settings;

     public function __construct($settings)
     {
         $this->settings = $settings;
         $this->uri = urldecode(preg_replace('/\?.*/iu', '', $_SERVER['REQUEST_URI']));

     }
     public process_path() {
         foreache( $this->settings['apps'] as $iterable_app )
         {
            $iterable_urls = require(BASE_DIR.'/apps/'.$iterable_app.'urls.php');
            foreach ($iterable_urls as $pettaern => $method) {
               if( preg_match($pettaern, $this->uri) )
               {
                  $this->app = array($iterable_app, array('pattern' => $pettaern, 'method' =>$method));
                  break(2);
               }
            }
            
         }
     }

}