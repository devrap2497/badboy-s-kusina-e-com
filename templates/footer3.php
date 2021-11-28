
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

footer{

  background: #fff;
  width: 100%;
  bottom: 0;
  left: 0;


}

/*footer::before{
  content: '';
  position: absolute;
  left: 0;
  top: 100px;
  height: 2px;
  width: 100%;
  background: #DADFE7;
}*/
footer .content{
  margin: auto;
  padding:3rem 18.5%;
}
footer .content .top{
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-bottom: 20px;
  margin-bottom: 50px;
  border-bottom: 1px solid #DADFE7;
}
.content .top .logo-details{
  color: #363A44;
  font-weight: 700;
  font-size: 30px;


}
.content .top .media-icons{
  display: flex;
}
.content .top .media-icons a{
  height: 40px;
  width: 40px;
  margin: 0 8px;
/*  padding-top: 11px;*/
  border-radius: 50%;
  text-align: center;
  line-height: 40px;
  color: #fff;
  font-size: 17px;
  text-decoration: none;
  transition: all 0.4s ease;
}
.top .media-icons a:nth-child(1){
  background: #fff;
  color: #333;
  border: 1px solid #333;

}
/*.top .media-icons a:nth-child(1):hover{
  color: #4267B2;
  background: #fff;
}*/
.top .media-icons a:nth-child(2){
  background: #fff;
  color: #333;
  border: 1px solid #333;
}
/*.top .media-icons a:nth-child(2):hover{
  color: #1DA1F2;
  background: #fff;
}*/
.top .media-icons a:nth-child(3){
  background: #fff;
  color: #333;
  border: 1px solid #333;
}
/*.top .media-icons a:nth-child(3):hover{
  color: #E1306C;
  background: #fff;
}*/
.top .media-icons a:nth-child(4){
  background: #fff;
  color: #333;
  border: 1px solid #333;
}
/*.top .media-icons a:nth-child(4):hover{
  color: #0077B5;
  background: #fff;
}*/
.top .media-icons a:nth-child(5){
  background: #fff;
  color: #333;
  border: 1px solid #333;
}
/*.top .media-icons a:nth-child(5):hover{
  color: #FF0000;
  background: #fff;
}*/
.top .media-icons a:hover {
  color: #FA363D;
  border-color: #FA363D;
}

footer .content .link-boxes{
  width: 100%;
  display: flex;
  justify-content: space-between;
}
footer .content .link-boxes .box{
  width: calc(100% / 5 - 10px);
}
.content .link-boxes .box .link_name{
  color: #363A44;
  text-transform: uppercase;
  font-size: 18px;
  font-weight: 700;
  margin-bottom: 10px;
  position: relative;
}
.link-boxes .box .link_name::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: -2px;
  height: 2px;
  width: 35px;
  background: #fff;
}
.content .link-boxes .box li{
  margin: 6px 0;
  list-style: none;
}
.content .link-boxes .box li a{
  color: #363A44;
  font-size: 15px;
  font-weight: 400;
  text-decoration: none;
  opacity: 0.8;
  transition: all 0.4s ease
}
.content .link-boxes .box li a:hover{
  opacity: 1;
  text-decoration: underline;
}
.content .link-boxes .input-box{
  margin-right: 55px;
}
.link-boxes .input-box input{
  height: 40px;
  width: calc(100% + 55px);
  outline: none;
  border: 2px solid #AFAFB6;
  background: #140B5C;
  border-radius: 4px;
  padding: 0 15px;
  font-size: 15px;
  color: #fff;
  margin-top: 5px;
}
.link-boxes .input-box input::placeholder{
  color: #AFAFB6;
  font-size: 16px;
}
.link-boxes .input-box input[type="button"]{
  background: #fff;
  color: #140B5C;
  border: none;
  font-size: 18px;
  font-weight: 500;
  margin: 4px 0;
  opacity: 0.8;
  cursor: pointer;
  transition: all 0.4s ease;
}
.input-box input[type="button"]:hover{
  opacity: 1;
}
footer .bottom-details{
  width: 100%;
  background: #363A44;
}
footer .bottom-details .bottom_text{
  margin: auto;
  padding:3rem 18.5%;
  display: flex;
  justify-content: space-between;
}
.bottom-details .bottom_text span,
.bottom-details .bottom_text a{
  font-size: 14px;
  font-weight: 300;
  color: #fff;
  opacity: 0.8;
  text-decoration: none;
}
.bottom-details .bottom_text a:hover{
  opacity: 1;
  text-decoration: underline;
}
.bottom-details .bottom_text a{
  margin-right: 10px;
}

@media(max-width:991px){

  footer .content, footer .bottom-details .bottom_text{
    padding:3rem;
  }
  .content .top .logo-details .logo_name {
  	font-size: 20px;
  }

  .content .link-boxes .box .link_name {
  	font-size: 16px;
  }


}
@media (max-width: 900px) {
  footer .content .link-boxes{
    flex-wrap: wrap;
  }
  footer .content .link-boxes .input-box{
    width: 40%;
    margin-top: 10px;
  }
}
@media (max-width: 700px){
  footer{
    position: relative;
  }
  .content .top .logo-details{
    font-size: 26px;
  }
  .content .top .media-icons a{
    height: 35px;
    width: 35px;
    font-size: 14px;
    line-height: 35px;
  }
  footer .content .link-boxes .box{
    width: calc(100% / 3 - 10px);
  }
  footer .content .link-boxes .input-box{
    width: 60%;
  }
  .bottom-details .bottom_text span,
  .bottom-details .bottom_text a{
    font-size: 12px;
  }
}
@media (max-width: 520px){
  footer::before{
    top: 145px;
  }
  footer .content .top{
    flex-direction: column;
  }
  .content .top .media-icons{
    margin-top: 16px;
  }
  footer .content .link-boxes .box{
    width: calc(100% / 2 - 10px);
  }
  footer .content .link-boxes .input-box{
    width: 100%;
  }
}

</style>


<footer>
	<div class="content">
		<div class="top">
			<div class="logo-details">
				<span class="logo_name">Badboy's Kusina</span>
			</div>
			<div class="media-icons">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
				<!-- <a href="#"><i class="fa fa-linkedin"></i></a>
				<a href="#"><i class="fa fa-youtube"></i></a> -->
			</div>
		</div>
		<div class="link-boxes">
			<ul class="box">
				<li class="link_name">Popular Cuisines</li>
				<li><a href="#">Ramen</a></li>
				<li><a href="#">Samgyup</a></li>
				<li><a href="#">Rice Bowl</a></li>
			
			</ul>
			<ul class="box">
				<li class="link_name">Links</li>
				<li><a href="#">Home</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Get Started</a></li>
			
			</ul>
			<ul class="box">
				<li class="link_name">Short cut</li>
				<li><a href="#">Services</a></li>
				<li><a href="#">Menu</a></li>
				<li><a href="#">Help</a></li>
				<li><a href="#">FAQs</a></li>
			
			</ul>
			<ul class="box">
				<li class="link_name">GET IN TOUCH</li>
				<li><a href="https://www.google.com/maps/search/+1477+Ibayo+St.+Malinta,+Valenzuela,+1440+Metro+Manila/@14.6899464,120.957984,17z/data=!3m1!4b1" title="Google Map Location">1477 Ibayo St. Malinta, Valenzuela, 1440 Metro Manila.</a></li>
				<li><a href="#" title="Contact">+91 8879887262</a></li>
				<li><a href="emailto:" title="Email">email@badboyskusina.com</a></li>
				
			
			</ul>
			
	
	
	
		</div>
	</div>
	    <div class="bottom-details">
      <div class="bottom_text">
        <span class="copyright_text">Copyright © 2021 <a href="#">Badboy's Kusina.</a></span>
        <span class="policy_terms">
          <a href="#">Privacy policy</a>
          
        </span>
      </div>
    </div>
</footer>
