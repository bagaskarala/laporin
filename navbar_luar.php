<nav class="navbar navbar-inverse" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">Laporin</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
                            <span class="li-social">
                                <a href="index.php"  class="btn btn-default btn-outline"><i class="fa fa-pencil"></i> Input Data</a> 
                            </span>
                        </li>
                        <li>
                            <span class="li-social">
                                <a href="status.php" class="btn btn-default btn-outline" ><i class="fa fa-tasks"></i> Status Laporan</a> 
                            </span>
                        </li>
                        <li>
                            <span class="li-social">
                            	<?php
								    if(isset($_SESSION['laporin'])){
								    	echo '<a href="admin.php?module=dashboard" class="btn btn-success"><i class="fa fa-sign-in"></i> '.$_SESSION['laporin']['username'].'</a>';
								    }
								    else {
								    	echo '<a href="login.php" class="btn btn-success"><i class="fa fa-sign-in"></i> Login</a>';
								    }
								    ?>
								    
								 
                                 
                            </span>
                        </li>
					</ul>
				</div>
			</div>
		</nav>