<?php
	session_start();
	require_once"../db/db_config.php";
	if(isset($_POST['signup']))
	{
		extract($_POST);
		$password = $password;
		$query1 = "select * from user where email='$email'";
		$n = mysqli_num_rows(select($query1));
		if($n==0)
		{
			$query2= "insert into user (email,password) values ('$email','$password')";
			if(iud($query2)>0)
			{
				echo 1;
			}
			else
			{
				echo 0;
			}
		}
		else
		{
			echo"Email Already Registered";
		}
	}
	if(isset($_POST['signup_users']))
	{
		extract($_POST);
		$password = $password;
		$query1 = "select * from users where email='$email'";
		$n = mysqli_num_rows(select($query1));
		if($n==0)
		{
			$query2= "insert into users (name,email,password) values ('$signup_name','$email','$password')";
			if(iud($query2)>0)
			{
				echo 1;
			}
			else
			{
				echo 0;
			}
		}
		else
		{
			echo"Email Already Registered";
		}
	}
	if(isset($_POST['signin']))
	{
		extract($_POST);
		$password = $password;
		if(mysqli_num_rows(select("select * from user where email='$email' "))==1)
		{
			$query = "select * from user where email='$email' and password='$password'";
			$n = mysqli_num_rows(select($query));
			if($n==1)
			{
				extract(mysqli_fetch_array(select($query)));
				$_SESSION['userid'] = $userid;
				$_SESSION['username'] = $name;
				$_SESSION['userimage'] = $image;
				echo 1;
			}
			else
			{
				echo 3;
			}
		}
		else
		{
			echo 2;
		}
	}if(isset($_POST['signin_user']))
	{
		extract($_POST);
		$password = $password;
		if(mysqli_num_rows(select("select * from users where email='$email' "))==1)
		{
			$query = "select * from users where email='$email' and password='$password'";
			$n = mysqli_num_rows(select($query));
			if($n==1)
			{
				extract(mysqli_fetch_array(select($query)));
				$_SESSION['usersid'] = $userid;
				$_SESSION['usersname'] = $name;
				$_SESSION['usersimage'] = $image;
				$_SESSION['user_login'] = "yes";
				echo 1;
			}
			else
			{
				echo 3;
			}
		}
		else
		{
			echo 2;
		}
	}
	if(isset($_POST['forget']))
	{
		extract($_POST);
		$query = "select * from user where email='$email'";
		$n = mysqli_num_rows(select($query));
		if($n>0)
		{
			extract(mysqli_fetch_array(select($query)));
			if(iud("update user set resetcode='".$email.time()."' where userid='$userid'")==1)
			{
				$_SESSION['reset_userid']=$userid;
				echo 1;
			}
		}
		else
		{
			echo 0;
		}
	}
	if(isset($_POST['book_ticket']))
	{
		extract($_POST);
		$n=iud("insert into book (seat_id,game_id,booking_for,userid,seats) values ('$seats_id','$gamesid','$booking_for','".$_SESSION['usersid']."','$no_of_seats') ");
		if($n>0){
		for($i=1;$i<=$no_of_seats;$i++){
			$n+=iud("insert into booking (seat_id,game_id,booking_for,userid) values ('$seats_id','$gamesid','$booking_for','".$_SESSION['usersid']."') ");
		}
		
			}
		echo $n>0 ? 1 : 0;
	}
	if(isset($_POST['reset']))
	{
		extract($_POST);
		$password = $password;
		if(iud("update user set password='$password',resetcode='' where resetcode='$resetcode' and userid='$reset_userid'")==1)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	if(isset($_POST['change_pass']) && $_POST['change_pass']==1)
	{
		extract($_POST);
		$opassword = $opassword;
		$password = $password;
		if(mysqli_num_rows(select("select userid from user where password='$opassword' and userid='".$_SESSION['userid']."'"))==1)
		{
			if(iud("update user set password='$password' where userid='".$_SESSION['userid']."' and password='$opassword'")==1)
			echo 1;
			else
			echo 0;
		}
		else
		echo 2;
	}
	if(isset($_POST['update_user_details']) && $_POST['update_user_details']==1)
	{
		extract($_POST);
		if(iud("update user set name='$username',contact='$contact',city='$city',address='$address' where userid='".$_SESSION['userid']."'")==1 )
		{
			$_SESSION['username'] = $username;
			echo 1;
		}
		else
		echo 0;
	}
	if(isset($_POST['add_category']) && $_POST['add_category']==1)
	{
		extract($_POST);
		if(mysqli_num_rows(select("select * from category where category_name='".strtolower($category_name)."'"))==0)
		{
			if(iud("insert into category (category_name,detail1,detail2) values ('".strtolower($category_name)."','$detail1','$detail2') ")==1)
			echo 1;
			else
			echo 0;
		}
		else
		echo 2;
	}
	if(isset($_POST['add_seats']) && $_POST['add_seats']==1)
	{
		extract($_POST);
		if(iud("insert into seats (seats_name,seats_limit,seats_rate) values ('$seats_name','$seats_limit','$seats_rate') ")==1)
		echo 1;
		else
		echo 0;
	}
	if(isset($_POST['add_extra_links']) && $_POST['add_extra_links']==1)
	{
		extract($_POST);
		if(iud("insert into extra_links (extra_links_name,link) values ('$extra_links_name','$url') ")==1)
		echo 1;
		else
		echo 0;
	}
	if(isset($_POST['delete_games']) && $_POST['delete_games']==1)
	{
		extract($_POST);
		if(iud("DELETE FROM gamess WHERE gamesid='$games_id'")==1)
		echo 1;
		else
		echo 0;
	}
	if(isset($_POST['delete_seats']) && $_POST['delete_seats']==1)
	{
		extract($_POST);
		if(iud("UPDATE seats SET status = '$status' WHERE seats_id = '$seats_id' ")==1)
		echo 1;
		else
		echo 0;
	}
	if(isset($_POST['delete_category']) && $_POST['delete_category']==1)
	{
		extract($_POST);
		if(iud("DELETE FROM category WHERE cat_id='$cat_id'")==1)
		echo 1;
		else
		echo 0;
	}
	if(isset($_POST['delete_extra_links']) && $_POST['delete_extra_links']==1)
	{
		extract($_POST);
		if(iud("DELETE FROM extra_links WHERE extra_linksid='$extra_linksid'")==1)
		echo 1;
		else
		echo 0;
	}
	if(isset($_POST['youtube_link_update']) && $_POST['youtube_link_update']==1)
	{
		extract($_POST);
		if(iud("UPDATE dynamic SET youtube='$youtube_link'")==1)
		echo 1;
		else
		echo 0;
	}
	if(isset($_POST['delete_yojna']) && $_POST['delete_yojna']==1)
	{
		extract($_POST);
		if(iud("DELETE FROM yojna WHERE yojnaid='$yojnaid'")==1)
		echo 1;
		else
		echo 0;
	}
	if(isset($_POST['delete_slide']) && $_POST['delete_slide']==1)
	{
		extract($_POST);
		if(iud("DELETE FROM slider WHERE sliderid='$slider_id'")==1)
		echo 1;
		else
		echo 0;
	}
	if(isset($_POST['delete_archive']) && $_POST['delete_archive']==1)
	{
		extract($_POST);
		if(iud("DELETE FROM archives WHERE archivesid='$archivesid'")==1)
		echo 1;
		else
		echo 0;
	}
	if(isset($_POST['imp_detail_update']) && $_POST['imp_detail_update']==1)
	{
		extract($_POST);
		if(iud("UPDATE dynamic set imp_detail='$imp_detail'")==1)
		echo 1;
		else
		echo 0;
	}
	if(isset($_POST['update_yojna']) && $_POST['update_yojna']==1)
	{
		extract($_POST);
		if(iud("UPDATE yojna set yojna_name='$yojna_name',link='$url' where yojnaid='$yojnaid'")==1)
		echo 1;
		else
		echo 0;
	}
	if(isset($_POST['update_extra_links']) && $_POST['update_extra_links']==1)
	{
		extract($_POST);
		if(iud("UPDATE extra_links set extra_links_name='$extra_links_name',link='$url' where extra_linksid='$extra_linksid'")==1)
		echo 1;
		else
		echo 0;
	}
	if(isset($_POST['update_category']) && $_POST['update_category']==1)
	{
		extract($_POST);
		if(iud("update category set category_name='".strtolower($category_name)."',detail1='$detail1',detail2='$detail2' where cat_id='$cat_id' ")==1)
		echo 1;
		else
		echo 0;
	}
	if(isset($_POST['add_Slide']))
	{
		extract($_POST);
		$image_name = $_FILES['myimage']['name'];
		$image_error = $_FILES['myimage']['error'];
		$tmp_name = $_FILES['myimage']['tmp_name'];
		$type = $_FILES['myimage']['type'];
		if($image_error==0)
		{
			extract(pathinfo($image_name));
			$imgname = $_SESSION['username'].time().".".$extension;
			move_uploaded_file($tmp_name,"../../images/slides/".$imgname);
			if(iud("insert into slider (title,path) values ('$slide_title','$imgname') ")==1)
			echo "<script>alert('Slider Added Successfully');window.location='../view_slides.php';</script>";
			else
			echo "<script>alert('Something Wrong');window.location='../add_slider.php';</script>";
		}
		else
		echo "Error in Uploading Image";
	}
	if(isset($_POST['add_games']))
	{
		extract($_POST);
		$image_name = $_FILES['myimage']['name'];
		$image_error = $_FILES['myimage']['error'];
		$tmp_name = $_FILES['myimage']['tmp_name'];
		$type = $_FILES['myimage']['type'];
		if($image_error==0)
		{
			extract($_POST);
			extract(pathinfo($image_name));
			$imgname = $_SESSION['username'].time().".".$extension;
			move_uploaded_file($tmp_name,"../../games/".$imgname);
			if(iud("insert into gamess (games_name,games_rating,games_image) values ('$games_name','$games_rating','$imgname') ")==1)
			echo "<script>alert('games Added Successfully');window.location='../view_games.php';</script>";
			else
			echo "<script>alert('Something Wrong');window.location='../add_games.php';</script>";
		}
		else
		echo "Error in Uploading Image";
	}
	if(isset($_POST['add_games']))
{
extract($_POST);
$image_name = $_FILES['myimage']['name'];
$image_error = $_FILES['myimage']['error'];
$tmp_name = $_FILES['myimage']['tmp_name'];
$type = $_FILES['myimage']['type'];
if($image_error==0)
{
extract(pathinfo($image_name));
$imgname = $_SESSION['username'].time().".".$extension;
move_uploaded_file($tmp_name,"../../games/".$imgname);
if(iud("insert into games (games_label,games_name,games_year,games_rating,games_image,seats) values ('$games_label','$games_name','$games_year','$games_rating','$imgname','$seats') ")==1)
echo "<script>alert('Archives Added Successfully');window.location='../view_archives.php';</script>";
else
echo "<script>alert('Something Wrong');window.location='../add_archives.php';</script>";
}
else
echo "Error in Uploading Image";
}
if(isset($_POST['add_author']))
{
extract($_POST);
$image_name = $_FILES['myimage']['name'];
$image_error = $_FILES['myimage']['error'];
$tmp_name = $_FILES['myimage']['tmp_name'];
$type = $_FILES['myimage']['type'];
if($image_error==0)
{
extract(pathinfo($image_name));
$imgname = $_SESSION['username'].time().".".$extension;
move_uploaded_file($tmp_name,"../author/".$imgname);
if(iud("insert into author (author_name,detail1,detail2,image,cat_id) values ('".strtolower($author_name)."','$detail1','$detail2','$imgname','$category') ")==1)
echo "<script>alert('Author Added Successfully');window.location='../view_authors.php';</script>";
else
echo "Something Wrong";
}
else
echo "Error in Uploading Image";
}
if(isset($_POST['delete_author']) && $_POST['delete_author']==1)
{
extract($_POST);
if(iud("DELETE FROM author WHERE author_id='$author_id'")==1)
echo 1;
else
echo 0;
}
if(isset($_POST['update_author']))
{
extract($_POST);
$image_name = $_FILES['myimage']['name'];
if(!empty($image_name))
{
$image_error = $_FILES['myimage']['error'];
$tmp_name = $_FILES['myimage']['tmp_name'];
$type = $_FILES['myimage']['type'];
if($image_error==0)
{
extract(pathinfo($image_name));
$imgname = $_SESSION['username'].time().".".$extension;
move_uploaded_file($tmp_name,"../author/".$imgname);
if(iud("update author set author_name='".strtolower($author_name)."',detail1='$detail1',detail2='$detail2',image='$imgname',cat_id='$category' where author_id='$author_id' ")==1)
echo "<script>alert('Author Updated Successfully');window.location='../view_authors.php';</script>";
else
echo "<script>alert('Author Updated Successfully');window.location='../view_authors.php';</script>";
}
else
echo "Error in Uploading Image";
}
else
{
if(iud("update author set author_name='".strtolower($author_name)."',detail1='$detail1',detail2='$detail2',cat_id='$category' where author_id='$author_id' ")==1)
echo "<script>alert('Author Updated Successfully');window.location='../view_authors.php';</script>";
else
echo "<script>alert('No Changes Done');window.location='../view_authors.php';</script>";
}
}
mysqli_close($cid);
?>