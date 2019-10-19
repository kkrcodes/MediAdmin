<?php

   function sanitize($str) {
      return strip_tags(trim(($str)));
   }

   function yon($val){
      if($val)
         return "Yes";
      else
         return "No";
   }
?>
