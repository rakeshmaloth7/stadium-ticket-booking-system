<script src="js/jquery-1.11.1.min.js"></script>
<!-- Dropdown-Menu-JavaScript -->
<script>
$(document).ready(function(){
SetMinDate();
function SetMinDate() {
var now = new Date();
var day = ("0" + now.getDate()).slice(-2);
var month = ("0" + (now.getMonth() + 1)).slice(-2);
var today = now.getFullYear() + "-" + (month) + "-" + (day);
$('#date').val(today);
$('#date').attr('min', today); }
$(".dropdown").hover(
function() {
$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
$(this).toggleClass('open');
},
function() {
$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
$(this).toggleClass('open');
}
);
});
</script>
<!-- //Dropdown-Menu-JavaScript -->
<script type="text/javascript" src="js/jquery.zoomslider.min.js"></script>
<!-- search-jQuery -->
<script src="js/main.js"></script>
<script src="js/simplePlayer.js"></script>
<script>
$("document").ready(function() {
$("#video").simplePlayer();
});
</script>
<script>
$("document").ready(function() {
$("#video1").simplePlayer();
});
</script>
<script>
$("document").ready(function() {
$("#video2").simplePlayer();
});
</script>
<script>
$("document").ready(function() {
$("#video3").simplePlayer();
});
</script>
<!-- pop-up-box -->
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<!--//pop-up-box -->
<div id="small-dialog1" class="mfp-hide">
<iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe>
</div>
<div id="small-dialog2" class="mfp-hide">
<iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe>
</div>
<script>
$(document).ready(function() {
$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
type: 'inline',
fixedContentPos: false,
fixedBgPos: true,
overflowY: 'auto',
closeBtnInside: true,
preloader: false,
midClick: true,
removalDelay: 300,
mainClass: 'my-mfp-zoom-in'
});
});
</script>
<script src="js/easy-responsive-tabs.js"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
</script>
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
<script src="js/owl.carousel.js"></script>
<script>
$(document).ready(function() {
$("#owl-demo").owlCarousel({
autoPlay: 3000, //Set AutoPlay to 3 seconds
autoPlay : true,
navigation :true,
items : 5,
itemsDesktop : [640,4],
itemsDesktopSmall : [414,3]
});
});
</script>
<!--/script-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
$(".scroll").click(function(event){
event.preventDefault();
$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
});
});
</script>
<script type="text/javascript">
$(document).ready(function() {
/*
var defaults = {
containerID: 'toTop', // fading element id
containerHoverID: 'toTopHover', // fading element hover id
scrollSpeed: 1200,
easingType: 'linear'
};
*/
$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<!--end-smooth-scrolling-->
<script src="js/bootstrap.js"></script>
<script>
$(document).ready(function(){
$("#show").on("click","#book_ticket", function(){
var no_of_seats = parseInt($("#no_of_seats").val());
no_of_seats = $.trim(no_of_seats);
var seats_id = $("#seats_id").val();
seats_id = $.trim(seats_id);
var gamesid = $(this).attr("data-gamesid");
var booking_for = $("#date").val();
var seats_available = parseInt($(this).attr("data-seats_available"));
if(seats_id=="")
{
$("#seats_id").focus();
$("#seats_id").css('border','2px solid #ec000069');
$("#error3").text('Please Select seats');
return false;
}
$("#seats_id").css('border','1px solid green');
if(no_of_seats<1)
{
$("#no_of_seats").focus();
$("#no_of_seats").css('border','2px solid #ec000069');
$("#error3").text('Please Provide a No. of Seats');
return false;
}
if(no_of_seats>seats_available)
{
$("#no_of_seats").focus();
$("#no_of_seats").css('border','2px solid #ec000069');
$("#error3").text('Please Provide Valid No. of Seats');
return false;
}
$("#no_of_seats").css('border','1px solid green');
$("#error3").text('');
$.ajax({
url:'admin/ajax/user.php',
method:'post',
data:{'no_of_seats':no_of_seats,'booking_for':booking_for,'seats_id':seats_id,'gamesid':gamesid,'book_ticket':1},
success:function(data){
if(data==1)
{
$(this).attr("disabled","disabled");
alert('Booking Success');
$("#show").html("<h4 class='w3l-inner-h-title text-center'>Booking Done Successfully</h4>");
}
else
{
$("#error3").text("Something Wrong");
alert(data);
}
}
});
return false;
});
$("#login_check").click(function(){
var email = $("#email").val();
email = $.trim(email);
var password = $("#password").val();
password = $.trim(password);
var email_valid = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
if(email=="")
{
$("#email").focus();
$("#email").css('border','2px solid #ec000069');
$("#error").text('Please Provide a Email');
return false;
}
if(!email_valid.test(email))
{
$("#email").focus();
$("#email").css('border','2px solid #ec000069');
$("#error").text('Invalid Email');
return false;
}
$("#email").css('border','1px solid green');
if(password.length<1)
{
$("#password").focus();
$("#password").css('border','2px solid #ec000069');
$("#error").text('Please Provide a Password');
return false;
}
else if(password.length<5)
{
$("#password").focus();
$("#password").css('border','2px solid #ec000069');
$("#error").text('Password Must Be 6 Charachter');
return false;
}
$("#password").css('border','1px solid green');
$.ajax({
url:'admin/ajax/user.php',
method:'post',
data:{'email':email,'password':password,'signin_user':1},
success:function(data){
if(data==1)
{
$(this).attr("disabled","disabled");
$("input").each(function(){
$(this).val('');
});
alert('Login Success');
location.reload();
}
else if(data==2)
{
$("#email").css('border','2px solid #ec000069');
$("#email").focus();
$("#error").text("Email Not Registered");
$("#password").css('border','2px solid #A8A8A8');
}
else if(data==3)
{
$("#password").css('border','2px solid #ec000069');
$("#password").focus();
$("#error").text("Credentials Wrong");
}
}
});
return false;
});
$("#show").on("change","#date",function(){
var date  = $(this).val();
var gamesid = $("#gamesid").attr("data-gamesid");
var no_of_seats = $("#no_of_seats").val();
no_of_seats = $.trim(no_of_seats);
var seats_id = $("#seats_id").val();
seats_id = $.trim(seats_id);
$.ajax({
url : "movie_data.php",
method:"post",
data:{"new_date":date,"no_of_seats":no_of_seats,"gamesid":gamesid,"seats_id":seats_id},
success:function(data){
$("#show").html(data);
update_seats_available_button();
}
});
});
function update_seats_available_button(){
$("#book_ticket").attr("data-seats_available",$("option:selected", "#seats_id").attr("data-seats_limit"));
}
$("#show").on("change","#seats_id",function(){
update_seats_available_button();
});
$("#signup").click(function(){
var email = $("#signup_email").val();
email = $.trim(email);
var signup_name = $("#signup_name").val();
signup_name = $.trim(signup_name);
var password = $("#signup_password").val();
password = $.trim(password);
var cpassword = $("#signup_cpassword").val();
var agree = $("#agree").is(':checked');
cpassword = $.trim(cpassword);
var email_valid = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
if(signup_name=="")
{
$("#signup_name").focus();
$("#signup_name").css('border','2px solid #ec000069');
$("#error2").text('Please Provide a Username');
return false;
}
$("#signup_name").css('border','1px solid green');
if(email=="")
{
$("#signup_email").focus();
$("#signup_email").css('border','2px solid #ec000069');
$("#error2").text('Please Provide a Username');
return false;
}
if(!email_valid.test(email))
{
$("#signup_email").focus();
$("#signup_email").css('border','2px solid #ec000069');
$("#error2").text('Invalid Email');
return false;
}
$("#signup_email").css('border','1px solid green');
if(password.length<5)
{
$("#signup_password").focus();
$("#signup_password").css('border','2px solid #ec000069');
$("#error2").text('Password Must Be 6 Charachter');
return false;
}
$("#signup_password").css('border','1px solid green');
if(password!=cpassword)
{
$("#signup_cpassword").focus();
$("#signup_password").css('border','2px solid #ec000069');
$("#signup_cpassword").css('border','2px solid #ec000069');
$("#error2").text('Password And Confirm Password Not Match');
return false;
}
$("#signup_cpassword").css('border','1px solid green');
if(!agree)
{
$("#agree").focus();
$("#agree").closest(".news-letter").css('border','2px solid #ec000069');
$("#error2").text('Please Accept The Agreement');
return false;
}
$("#agree").closest(".news-letter").css('border','none');
$("#error2").text('');
$.ajax({
url : "admin/ajax/user.php",
method:"post",
data:{"signup_name":signup_name,"email":email,"password":password,"cpassword":cpassword,"signup_users":1},
success:function(data){
if(data==1)
{
$(this).attr("disabled","disabled");
$("input").each(function(){
$(this).val('');
});
alert("Signup Success");
location.reload();
}
else
{
$("#signup_email").css('border','2px solid #ec000069');
$("#signup_email").focus();
$("#error2").text(data);
alert(data);
}
}
});
return false;
});
});
</script>