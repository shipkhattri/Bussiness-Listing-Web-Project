	<!--PRE LOADING-->
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>
	<!--BANNER AND SERACH BOX-->
	<section>
		<div class="v3-top-menu">
			<div class="container">
				<div class="row">
					<div class="v3-menu">
						<div class="v3-m-1">
							<a href="index.php"><img src="images/logo2.png" alt=""> </a>
						</div>
						<div class="v3-m-2">
							<ul>
								<li><a class='dropdown-button' href='index.php' >Home</a>
								</li>
								<li><a class='dropdown-button' href='db-listing-add.php' >Refer Business</a>
								</li>
								<li><a class='dropdown-button' href='#' >Dashboard</a>
								</li>
								<li><a class='dropdown-button' href='#' >Pages</a>
								</li>
								<li><a class='dropdown-button' href='admin-login.php' >Admin</a>
								</li>
							</ul>
						</div>
						<div class="v3-m-3">
							<div class="v3-top-ri v32-top-ri">
								<ul>
								    	<?php 
								        $t="Sign In";
								        if(isset($_SESSION['username']))
                                        {
                                           
                				?><li><a href="index.php" class="v3-menu-sign"><i class="fa fa-user"></i><?php echo $_SESSION['username']; ?></a> </li>
                				
									<li><a href="logout.php" class="v3-add-bus"><i class="fa fa-sign-out" aria-hidden="true"></i>Log Out</a></li><?php
                                        }
                                        else{
    						        ?><li><a href="login.php" class="v3-menu-sign"><i class="fa fa-sign-in"></i> Sign In</a> </li><?php
                                        } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>