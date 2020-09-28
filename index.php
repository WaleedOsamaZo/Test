
<?php 
  session_start();
  include('config.php');
  if (isset($_SESSION['username']))
{
  $user_info = $_SESSION['fetch_user_data'];
  $stars =  $user_info->STARS;
  $collage = $user_info->collage;
  $state = $user_info->state;
  $university = $user_info->University;
  $profile = $_SESSION['profile_pic'];

 
      echo "<div>";
      echo "Wellcome : " . $_SESSION['username'];
      echo "<br>";
      echo "Your Email is : " . $_SESSION['email'];
      echo "<br>";
      echo "Your stars is : " . $stars;
      echo "<br />";
      echo "<form action = '' method = 'GET'><input type = 'submit' name = 'logout' value = 'LOGOUT'></form>";
      echo "</div>";
      if (isset($_REQUEST['logout']))
      {
          session_destroy();
          session_unset();
          $_SESSION = array();
          header('location:index.php');
      }

        ?>
       <a id = "a_post post"  style = 'position : fixed; top : 50%;left: 0%;'><img  src = 'img/post-button.png'/></a>
      
     
        <?php

        $query = "SELECT id , POST_ID , username , profile_pic , email , POST_TEXT ,POST_TIME  FROM accounts , posts where CLIENT_ID = ID AND University = '$university' and collage = '$collage' ORDER BY POST_TIME DESC LIMIT 25 "; //after adding Foreign Key between tables
        $prepare = $db_connection->prepare($query);
        $prepare->execute();
        $posts = $prepare->fetchall(PDO::FETCH_ASSOC);

      
        
     for ($ex = 0; $ex < count($posts); $ex++)
              {
              $full_datetime = date('Y/m/j g:i:s' ,strtotime($posts[$ex]['POST_TIME']));
              $Months_name  = date( 'F', strtotime($posts[$ex]['POST_TIME']));
              $Hours =  date('G', strtotime($posts[$ex]['POST_TIME'])); // witX`hout zero leading 
              $_Hours =  date('g', strtotime($posts[$ex]['POST_TIME']));
              $Years =  date('Y', strtotime($posts[$ex]['POST_TIME']));
              $Months =  date('m', strtotime($posts[$ex]['POST_TIME']));
              $Minutes =  date('i', strtotime($posts[$ex]['POST_TIME']));
              $Socends =  date('s', strtotime($posts[$ex]['POST_TIME']));
              $Day =  date('j', strtotime($posts[$ex]['POST_TIME']));
              $Ante =  date('a', strtotime($posts[$ex]['POST_TIME']));
              $P_Time = "$Day" . " " . "$Months_name" . " at " . "$_Hours" . ":" . "$Minutes" . " $Ante";
              if ($Hours == date("G") && $Minutes == date("i") && $Years == date("Y")&& $Day == date('j') && $Months == date('n'))
                   {
                    $P_Time = "Now";

                   }elseif($Years == date('Y') && $Months == date('n') && $Day == date('j') &&  abs (date('G') - $Hours) == 1 )
                   {
                     
                     $X = 60-$Minutes ; 
                     $Z = $X + date('i');
                     
                      $rest = $Z;
                          if($rest >=  60)
                          {
                            $P_Time = "1   hour later";
                          }
                         else 
                         {

                          $P_Time = $rest .  " mins later ";

                         }
                   }
                   elseif($Years == date('Y') && $Months == date('n') && $Day == date('j') && $Hours == date('G') )
                   {
                     
                      $rest = date('i') - $Minutes ;
                      if ($rest == 1)
                      {
                        $P_Time = $rest .  " min later ";

                      }else 
                      {
                      $P_Time = $rest .  " mins later ";
                      }
                        
                   }elseif($Years == date('Y') && $Months == date('n') && $Day == date('j')   )
                        { 
                          $rest = date('G') - $Hours ;
                            if($rest == 1)
                            {
                                $P_Time = $rest. " hour later";
                            }
                            else 
                            {
                          $P_Time = $rest . " hours later"; ///TO BE CONTINUE .........WaleedOsama
                            }
                        }elseif($Years == date('Y') && $Months == date('n') )
                          {
                            $rest = date('j') - $Day;
                            
                            if($rest ==1 )
                            {
                              $P_Time = $rest . " day later";
                            }
                            else 
                            {
                                            if($rest == 7 )
                                            {
                                              $P_Time = "Week ago";
                                            }elseif($rest == '14')
                                              {
                                                $P_Time = "2 Weeks ago";
                                              }
                                              elseif($rest == '21')
                                              {
                                                $P_Time = "3 Weeks ago";
                                              }
                                              elseif($rest == '28' || $rest == '29' || $rest == '30')
                                              {
                                                $P_Time = '1 month ago';
                                              }else 
                                              {
                                              $P_Time = $rest . " days later";
                                              }
                                            }
                                    }elseif( $Years != date('Y'))
                                    {
                                      if($Years > 1970 && $Years < 2050)
                                        {
                                          $P_Time = "$Day" . " " . "$Months_name" . " at " . "$_Hours" . ":" . "$Minutes" .  " $Ante" . " $Years";

                                        }else 
                                        {
                                          $P_Time  = "Undefiend date";
                                            #$P_Time = "$Day" . " " . "$Months_name" . " at " . "$_Hours" . ":" . "$Minutes" .  " $Ante" . " $Years";
                                        }
                                    }
                  
                           
                           
                 
                 
 echo "<div style = 'width : 50% ; position: absolute ; left : 20% ; border:solid 1px black;'> " . "<img src = '$profile' style = 'border-radius : 50%;display:inline;'></img>".
 "<span style = 'display:inline;'>".$posts[$ex]['username']  ."</span>"."<span id = 'post_time' style = 'position :absolute; width : 100%; text-align:right;'>". $P_Time."</span>".  "<hr>" .
 $posts[$ex]['POST_TEXT'] . "</div>" . "<br /><br /><br /><br /><br />";

             
/* Trying for check post time autmoatic 
               $current_h = date('g');
               $current_i = date('i') ;
               $current_y = date('Y');
               $post_h    = date('g', strtotime($posts[$ex]['POST_TIME']));      
               $post_i    = date('i', strtotime($posts[$ex]['POST_TIME']));
               $post_y    = date('Y', strtotime($posts[$ex]['POST_TIME']));
      
               echo "<script>  var hour_from_server = $current_h; var min_from_server = $current_i; var year_from_server = $current_y;  var hour_from_post = $post_h;  var min_from_post = $post_i; var year_from_post = $post_y; full_datetime = 'now';</script>";
              echo "<script src = 'js/setinterval.js'></script>";

  */            
           
                              

                              }  
                              
              


















    }





      else 
{
 header('location:login.php');
}
echo "<pre>";



?>