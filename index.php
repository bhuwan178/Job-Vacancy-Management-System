<?php
include('include/header.php');
?>


    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-xl-10 ftco-animate mb-5 pb-5" data-scrollax=" properties: { translateY: '70%' }"> <br><br><br><br>
           
            <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">JobNexus:  <br><span>Bridging Talent with Opportunity!</span></h1>

						<div class="ftco-search">
							<div class="row">
		            <div class="col-md-12 nav-link-wrap">
			            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			              <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Find a Job</a>

			              

			            </div>
			          </div>
			          <div class="col-md-12 tab-wrap">
			            
			            <div class="tab-content p-4" id="v-pills-tabContent">

			              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
			              	<form action="index.php" method="post" class="search-job">
			              		<div class="row">
			              			<div class="col-md">
			              				<div class="form-group">
				              				<div class="form-field">
				              					<div class="icon"><span class="icon-briefcase"></span></div>
								                <input type="text" name="key" id="key" class="form-control" placeholder="eg. Web Developer">
								              </div>
							              </div>
			              			</div>

			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
				              					<div class="select-wrap">
						                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
						                      <select name="category" id="category" class="form-control">
                                  <option value="">Category</option>
                                    <?php
                                    include('db_connection/db.php');
                                    $query=mysqli_query($conn,"select * from job_category");
                                    while($row=mysqli_fetch_array($query)){
                                      ?>
                                <option value="<?php echo $row['id'];?>"> <?php echo $row['category']; ?> </option>
                                  <?php

                
                                    }
                                    ?>
						                    
						                      </select>
						                    </div>
								              </div>
							              </div>
			              			</div>
			              		
    
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
								                <input type="submit" value="Search" name="search" id="search" class="form-control btn btn-primary">
								              </div>
							              </div>
			              			</div>
			              		</div>
			              	</form>
			              </div>

			             
			            </div>
			          </div>
			        </div>
		        </div>
          </div>
        </div>
      </div>
    </div>

<?php
include('db_connection/db.php');

$keyword = '';
$category = '';

if (isset($_POST['search'])) {
  $keyword = $_POST['key'];
  $category = $_POST['category'];
}

$sql = mysqli_query($conn, "SELECT * FROM all_jobs 
    LEFT JOIN company ON all_jobs.customer_email = company.company_admin 
    WHERE keyword LIKE '%$keyword%' OR category='$category' ") 
    or die("Query Failed: " . mysqli_error($conn));
?>


    <section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Recently Added Jobs</span>
            <h2 class="mb-4"><span>Recent</span> Jobs</h2>
          </div>
        </div>
				<div class="row">

        <?php
        while ($row=mysqli_fetch_array($sql)){

        ?>

					<div class="col-md-12 ftco-animate">

            <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

              <div class="mb-4 mb-md-0 mr-5">
                <div class="job-post-item-header d-flex align-items-center">
                  <h2 class="mr-3 text-black h3"><?php echo $row['job_title'];?> </h2>
                  <div class="badge-wrap">
                  
                  </div>
                </div>
                <div class="job-post-item-body d-block d-md-flex">
                  <div class="mr-3"><span class="icon-layers"></span> <a href="#"><?php echo $row['company_name'];?> </a></div>
                  <div><span class="icon-my_location"></span> <span><?php echo $row['country']?>, <?php echo $row['c_state']?>, <?php echo $row['city']?>, </span></div>
                </div>
              </div>

              <div class="ml-auto d-flex">
                <a href="job-single.php?id=<?php echo $row['job_id']; ?>" class="btn btn-primary py-2 mr-1">Apply Job</a>
              </div>
            </div>
          </div>

					
          <?php 
                }
          ?>
          
          
				
			</div>
		</section>
        </div>
   
<?php
include('include/footer.php');
?>