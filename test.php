<?php session_start();
  include('config.php');
    if($_SESSION['profile_pic'] == "")
        {
            $_SESSION['profile_pic'] == "https://i.ibb.co/YhM6tMn/male.png";
        }
?>
<form action = "" METHOD = 'POST'>
    <div>
        <div style = 'display:inline;'><img src = '<?php echo $_SESSION['profile_pic'];?>'></div>
        <div style = 'display:inline;'><span> <?php   echo $_SESSION['username']?></span></div>
        <div><span>PostNumber : </span></div>
      <div>  <textarea  style= 'width:80%;height : 40%; resize:none;position : absolute; left : 7%;' placeholder = 'Write your Post : ' name = 'post_textarea'></textarea></div>
        <input type = 'submit' style = 'position:absolute;right:13%;top:50%; '  value = 'POST'/>
    </div>
</form>

<?php 
if(isset($_POST['post_textarea']))
{
$id = $_SESSION['id'];
$post = $_POST['post_textarea'];
$post_filter = str_replace("<script>"  , "☺" , $post); //prevent XML XSS Vulns
$post_filter2 = str_replace("</script>" , "☻" , $post_filter);
$filter1  =strip_tags($post_filter);
$filter2 = addslashes($filter1); //prevent SQL INJECTION 
$POST_F = $filter2;

    if(trim($POST_F) == "")
       {
        echo      "<script>alert(\"Write Post First .. [Empty Post]\");</script>";
         }else 
            {
            $query = "INSERT INTO POSTS (Client_id, POST_TEXT) values ('$id','$POST_F');";
            $add = $db_connection->prepare($query);
            $add->execute();
            }
}
$var = 50;
?>