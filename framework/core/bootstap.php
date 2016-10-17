<?php  

/**
* 
*/
class CoreUploading
{
   public 
      $settings,
      $uri,
      $app;

   public function __construct($settings)
   {
      $this->settings = $settings;
      $this->uri = urldecode(preg_replace('/\?.*/iu', '', $_SERVER['REQUEST_URI']));
      $this->app = false;
      $this->process_path();
   }
   public function process_path() 
   {
      foreach( $this->settings['apps'] as $iterable_app )
      {
         $iterable_urls = require(BASE_DIR.'/apps/'.$iterable_app.'/urls.php');
         foreach ($iterable_urls as $pettaern => $method) {
            if( preg_match($pettaern, $this->uri) )
            {
               $this->app = array($iterable_app, array('pattern' => $pettaern, 'method' =>$method));
               break(2);
            }
         }
         
      }

      if( $this->app === 'false' )
      {
         exit('App not found!');
      }
  }

  public function process_controllers()
  {
     if( $this->app || is_array($this->app) )
     {
      
     }
  }

}