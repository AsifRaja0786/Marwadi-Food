<?php

class config{
        public $header;
        public function __construct(){
            $this->header .= 'From: MU FOOD ' ."\n";
            $this->header .= 'Reply-To: jhabro1010@gmail.com' ."\n";
            $this->header .= 'MIME-Version:1.0' ."\n";
            $this->header .= 'Content-Type:text/html;charset=ISO-8859-1' ."\n";
        }
    }
    
?>