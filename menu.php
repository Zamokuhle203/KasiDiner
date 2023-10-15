<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Menu</title>
    <link rel="stylesheet" href="index.css">
</head>
<body class="myaccount-body">
    <!--=======================MAIN DASHBOARD==========-->

   echo ""; <nav id="mySidenav" class="myaccount-sidenav">
        <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
        <a href="#fullmeals" class="menu active">FULL MEAL</a>  
        <a href="#fastfood" class="menu">FAST FOOD</a>
        <a href="#dessert" class="menu">DESSERT</a> 
        <a href="#drinks" class="menu">DRINKS</a>
        
    </nav>


<!-- ==============HEADER =================== -->

    <div class="myaccount-container" id="contents">
        
        <header class="myaccount-header">
            <a href="home.php" ><img src="images/homey.png" width="30px" height="30px"></a>
            <h1>Menu</h1>
            
        </header>

        <div class="myaccount-list">
          
        </div>
    </div>
	
	<!--===================FULL MEALS =========================-->

    <section class="myaccount-menu" id=fullmeals margin-left="90px">
       
		<h1 class="heading">full<span>meals</span></h1>
		<div class="box-container">
                  
			<div class="box">
				<img src='images/fullmeal.jpeg' alt="Inyama Yentloko" class="menuimgs">
				<h3>Pap and Meat</h3>
				<dl class="price">
					<dd >R50.00</dd>
				</dl>
                
                
            </div>
			
			<div class="box">
				<img src='images/umngqusho.jpeg' alt="Inyama Yentloko" class="menuimgs">
				<h3>umngqusho</h3>
				<dl class="price">
					<dd >R35.00</dd>
				</dl>
				
			</div>

            <div class="box">
				<img src='images/potyi.jpg' alt="Inyama Yentloko" class="menuimgs">
				<h3>Isteringi</h3>
				<dl class="price">
					<dd >R35.00</dd>
				</dl>
				
			</div>
            <div class="box">
				<img src='images/sundaykos.jpeg' alt="Inyama Yentloko" class="menuimgs">
				<h3>Sundaykos</h3>
				<dl class="price">
					<dd >R35.00</dd>
				</dl>
				
			</div>

			<div class="box">
				<img src="images/beefanddumpling.jpg" alt="amanqina" class="menuimgs">
				<h3> Beef and Dumplings</h3>
				
				<dl class="price">
					<dd>R15.00 per kg</dd>
				</dl>
				
			</div>
                  
			<div class="box">
				<img src="images/icalasmiley.jpg" alt="Inyama Yentloko" class="menuimgs">
				<h3>Iskobho</h3>
				<dl class="price">
					<dd >R20.00</dd>
				</dl>
				
			</div>

			<div class="box">
				<img src="images/umleqwa.jpg" alt="amanqina" class="menuimgs">
				<h3>Full mleqwa</h3>
				
				<dl class="price">
					<dd>R70.00</dd>
				</dl>
                
			</div>


			<div class="box">
				<img src="images/amanqina.jpg_large" alt="amanqina" class="menuimgs">
				<h3>Amanqina</h3>
				
				<dl class="price">
					<dd>R15.00 per kg</dd>
				</dl>
				
			</div>

			<div class="box">
				<img src="images/mogodu.jpg" alt="amanqina" class="menuimgs">
				<h3>Mugodu/Upensi</h3>
				
				<dl class="price">
					<dd>R40.00 per plate</dd>
                </dl>
			</div>

			<div class="box">
				<img src="images/amathumbu.jpg" alt="Dessert 2" class="menuimgs">
				<h3>Amathumbu</h3>
			   
				<dl class="price">
					<dd>R10.00 per kg</dd>
				</dl>
				
			</div>
                   
			<div class="box">
				<img src="images/ulusu.jpg" alt="Dessert 2" class="menuimgs">
				<h3>Inyama Yangaphakathi</h3>
				<dl class="price">
					<dd>R25.00 per kg</dd>
				</dl>
			</div>

			<div class="box">
				<img src="images/umbengo.jpg" alt="Dessert 2" class="menuimgs">
				<h3>Inyama Ethosiwe</h3>
				<dl class="price">
					
					<dd>R30.00 per kg</dd>
				</dl>
				
			</div>

            
                    
        </div>
        
    </section>
	
		<!--===================FAST FOOD =========================-->
		<section class="myaccount-menu" id=fastfood>
       
			<h1 class="heading">fast<span>food</span></h1>
			<div class="box-container">
			
            
            <div class="box">
                <img class="menuimgs" src="images/BigMouth.jpg" alt="Dessert 2">
                <h3>Joburg </h3>
                <dl  class="price">
                    <dd>R50.00</dd>
                </dl>
                
            </div>


            <div class="box">
                <img class="menuimgs" src="images/withEgg.jpg" alt="Dessert 2" class="box-image">
                <h3> <font face="Arial">Cape Town</font></h3>
               <dl class="price">
                    
                    <dd>R40.00</dd>
                </dl>
                
            </div>


            <div class="box">
                <img class="menuimgs" src="images/Durban.jpg" alt="Dessert 2" class="box-image">
                <h3> <font face="Arial">Durban</font></h3>
               <dl  class="price">
                    
                    <dd>R30.00</dd>
                </dl>
                
            </div>


            <div class="box">
                <img class="menuimgs" src="images/Graham.jpg" alt="Dessert 2" class="box-image">
                <h3> <font face="Arial">Grahamstown</font></h3>
                <dl class="price">
                    
                    <dd>R15.00</dd>
                </dl>
            
            </div>

            <div class="box">
                <img class="menuimgs" src="images/BigMouth.jpg" alt="Dessert 2" class="box-image">
                <h3> <font face="Arial">BigMouth</font></h3>
                <dl class="price">
                    <dd>R10.00</dd>
                </dl>
                
            </div>

<!--AMAGWINYA-->
            <div class="box">
                <img class="menuimgs" src="images/gwinyaMince.jpg" alt="Dessert 2" class="box-image">
                <h3> <font face="Arial">Igwinya and Mince</font></h3>
                <dl class="price">
                    
                    <dd>R10.00</dd>
                </dl>
                
            </div>

            <div class="box">
                <img class="menuimgs" src="images/Igwinya.jpg" alt="Dessert 2" class="box-image">
                 <h3> <font face="Arial">Igwinya and Atchaar</font></h3>
                <dl class="price">
                    
                    <dd>R7.00</dd>
                </dl>
               
            </div>

            <div class="box">
                <img class="menuimgs" src="images/gwinyaPlain.webp" alt="Dessert 2" class="box-image">
                <h3> <font face="Arial">Igwinya and Cheese</font></h3>
                <dl>
                    <dd>R15.00</dd>
                </dl>
            </div>

            <div class="box">
                <img class="menuimgs" src="images/gwinyaPlain.webp" alt="Dessert 2" class="box-image">
                <h3> <font face="Arial">Igwinya and polony</font></h3>
                <dl>
                    <dd>R8.00</dd>
                </dl>
                
            

            </div>

            <div class="box">
                <img class="menuimgs" src="images/gwinyaPlain.webp" alt="Dessert 2" class="box-image">
                <h3> <font face="Arial">Igwinya and Russian</font></h3>
                <dl>
                    <dd>R10.00</dd>
                </dl>
          
            </div>


            <div class="box">
                <img class="menuimgs" src="images/gwinyaPlain.webp" alt="Dessert 2" class="box-image">
                <h3> <font face="Arial">Igwinya and Isbindi</font></h3>
                <dl class="price">
                    <dd>R20.00</dd>
                </dl>
                
            </div>

            <div class="box">
                <img class="menuimgs" src="images/gwinyaBurger.jpg" alt="Dessert 2" class="box-image">
                <h3> <font face="Arial">Igwinya and Burger patty</font></h3>
                <dl class="price">
                    <dd>R10.00</dd>
                </dl>
                
            </div>

            

        </div>
        <!-- Add this button to navigate to the order summary page -->

    
    </section>
<!--========================DESSERT ===========================-->
	<section class="myaccount-menu" id=dessert>
       
			<h1 class="heading"><span>Dessert</span></h1>
			<div class="box-container">
					
                    <div class="box">
                        <img src="images/large.jpg" alt="Dessert 2" class="menuimgs" width="70">
                        <h3>Large</h3>
                        <dl class="price">
    
                            <dd >R50.00</dd>
                        </dl>
                   
                    </div>


                    <div class="box">
                        <img src="images/Medium.jpg_large" alt="Dessert 2" class="menuimgs" width="70">
                        <h3>Medium</h3>
                       
                        <dl class="price">
    
                            <dd>R35.00</dd>
                        </dl>
                        
                    </div>


                    <div class="box">
                        <img src="images/small ice.jpg" alt="Dessert 2" class="menuimgs" width="70">
                        <h3>Small</h3>
                        
                        <dl  class="price">
    
                            <dd >R15.00</dd>
                        </dl>
                    
                    </div>


                    <div class="box">
                        <img src="images/icecream.jpg" alt="Dessert 2" class="box-image">
                        <h3>Ice cream with cone</h3>
                        <dl class="price">
    
                            <dd>R4.00</dd>
                        </dl>
                    
                    </div>
                    
            </div>
        </section>
<!--==================DRINKS=============================-->
<section class="myaccount-menu" id=drinks>
       
			<h1 class="heading"><span>drinks</span></h1>
			<div class="box-container">
                    
                    <div class="box">
                        <img src="images/castle_lite-2.jpg" alt="Dessert 2" class="menuimgs" >
                        <h3> <font face="Arial">Beer</font></h3>
                        
                        
                        <dl class="price">
    
                            <dd >R25.00</dd>
                        </dl>
                  
                    </div>
                    
                    <div class="box">
                        <img src="images/fanta.jpg" alt="Dessert 2" class="menuimgs" >
                        <h3> <font face="Arial">Soft-drink</font></h3>
                    
                        <dl class="price">
    
                            <dd >R15.00</dd>
                        </dl>
                    
                    </div>
                    <div class="box">
                        <img src="images/juice.jpg" alt="Dessert 2" class="menuimgs" >
                        <h3> <font face="Arial">Fruit-juice</font></h3>
                       
                        <dl class="price">
    
                            <dd >R10.00</dd>
                        </dl>
                    
                    </div>

                    <div class="box">
                        <img src="images/lemonTwist.jpg" alt="Dessert 2" class="menuimgs" >
                        <h3> <font face="Arial">Lemon Twist</font></h3>
                       
                        <dl class="price">
    
                            <dd >R18.00</dd>
                        </dl>
                    
                    </div>
                    
                   
                    <div class="box">
                        <img src="images/amanzi.jpg" alt="Dessert 2" class="menuimgs" >
                        <h3><font face="Arial">water</font></h3>
                        
                        <dl class="price">
    
                            <dd >R0.00</dd>
                        </dl>
                    
                    </div>
                    
                </div>
            </div>

</section>
   
    <script src="script.js"></script>
	
</body>
</html>