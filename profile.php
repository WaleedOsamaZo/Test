<?php 

session_start();

require_once("SDK/config.php");

    if(isset($_GET['code']))
    {
       if (isset($_GET['state']))

           {

              $Handler->getPersistentDataHandler()->set('state', $_GET['state']);




                   try 
                       {

                          $access_token = $Handler->getAccessToken(); 

                       }catch(\Facebook\Exceptions\FacebookResponseException $ex)
                          {
                              echo "Error in Facebook Response : " . $ex->getMessage();
                              die();
                          }catch (\Facebook\Exceptions\FacebookSDKException $ex)

                          {
                            echo "Error in SDK Configuration  : " . $ex->getMessage();
                            die();
                          }catch (Facebook\Exceptions\FacebookAuthenticationException $ex)
                          {
                            echo "Error : " . $ex->getMessage();
                          }




                    $fields = 'me?fields=id,name,gender,email';
                    $get_user_info_JSON = $facebook_SDK->get($fields , $access_token);
                    $user_info = $get_user_info_JSON->getGraphUser();
              
                              session_start();

                          $_SESSION['access_token'] = $access_token;
                          $_SESSION['id'] =$user_info['id'];
                          $id = $user_info['id'];
                          $_SESSION['username'] = $user_info['name'];
                          $Theusername = addslashes($user_info['name']);
                          $_SESSION['email'] = $user_info['email'];
                          $Email = addslashes($user_info['email']);
                          $profile_pic = 'https://graph.facebook.com/' .$id. '/picture';
                          $profile = addslashes($profile_pic);
                          $_SESSION['profile_pic'] = $profile_pic;
                          include('config.php');
                          $query = "SELECT * FROM accounts WHERE id = $id";
                          $prepare = $db_connection->prepare($query);
                          $prepare->execute();
                          if ($prepare->rowcount() >0)
                                {






                            $user_data =  $prepare->fetch(PDO::FETCH_OBJ);
                            $_SESSION['stars'] = $user_data->stars;
                                    
                             header('location:index.php');


                             //هنا هتطلعلو alert
                             // بيقولو انت مسجل قبل كدا سيتم تحويلك ل صفحه البدايه و تايمر من 5 ل صفر
                      



                                }else 
                                {





                                    
                                       $query2 = "INSERT INTO accounts (id,username,email,profile_pic,stars,password) VALUES ('$id','$Theusername','$Email', '$profile' , 0 , 'From Facebook 0xSignWithFacebook0x');";
                                       $prepare2 = $db_connection->prepare($query2);
                                        $execute = $prepare2->execute();




                                   
                                        // هنا  هتطلعلي alert
                                        // بيقول شكرا علي التسجيل سيتم تحويلك الان و تعمل تايمر عد تصاعدي من 5 ل صفر وبعدين تحولو ل الاندكس





                                    if (!$execute)
                                    {
                                        echo "Error , Please Try again";
                                        sleep(3);
                                        header('location:login.php');
                                    }
                                
                       




                                  
                                }
           

          }else 
                         {
                       
                         }
    }
else 
    {

    }


echo "<pre>";
var_dump($user_info);
?>