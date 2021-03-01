<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title> Total Users</title>

      <?php include('include/head.php')?>
    
  </head>

  <body>

  <section id="container" class="">
  
  
      <!--header start-->
      <header class="header white-bg">
	  
           <?php include('include/navbar.php')?>
		   
      </header>
      <!--header end-->
      
      
      <!--sidebar start-->
		<aside>
         
       <?php include('include/sidebar.php')?>
	   
        </aside>
      <!--sidebar end-->
      
      
      
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Registered Users Record
                          </header>
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th>User Name</th>
                                          <th>Email</th>
                                          <th>Industry</th>
                                          <th class="hidden-phone">Mobile Number</th>
                                          <th class="hidden-phone">Country</th>
                                           <th class="hidden-phone"> City</th>
                                          
                                      </tr>
                                      </thead>
									  
									  
                                      <tbody>
									  
                                       <?php // foreach($totalusers->result() as $totaluser):?>
						
						
										<tr class="gradeX">
											<td>nauman ahmed</td>
											<td>wwe</td>
											<td>echampion</td>
											<td>demo</td>
											<td>demo</td>
											<td>demo</td>
										</tr>	
											
											
										<?php // endforeach ?>	
                                    


									</tbody>
                                    


									<tfoot>
                                      <tr>
                                          <th>User Name</th>
                                          <th>Email</th>
                                          <th>Industry</th>
                                          <th class="hidden-phone">Mobile Number</th>
                                          <th class="hidden-phone">Country</th>
                                           <th class="hidden-phone"> City</th>
                                      </tr>
                                      </tfoot>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
	  
	  
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016 &copy; by HRGULF.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
	  
  </section>
  
  

    <!-- js placed at the end of the document so the pages load faster -->
	
   <?php include('include/javascripts.php')?>
   
   
    
    
   
  </body>
</html>
