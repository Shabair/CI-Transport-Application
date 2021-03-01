<style>
	.pagination-split li{
	float:left;
	margin:1px;
	padding: 5px 15px;
	background-color:#666;
	}
	.pagination-split{
	margin-bottom:15px;
	}
	.pagination-split li.active{
	background-color:#186fc9;
	}
	.pagination-split li a{
	color:#FFF;
	}
</style>
<div id="titlebar">
	<div class="container">
		<div class="sixteen columns">
			<h2>Find job</h2>
			<div class="jobsearch-form">
				<form  method="post" id="job_search">
					<div class="six columns">
						<input type="text" name="job_search" placeholder="job title, keywords" value="<?php if(isset($_POST['job_title'])) echo $job_title; ?>"/>
					</div>
                    <?php if(isset($industries)):?>
					<div class="four columns">
						<select onchange="job_filter()" class="chosen-select" name="job_industry" style="width:300px" >
							<option value="" >-ALL INDUSTRY-</option>
                            <?php foreach($industries as $industry):?>
                            <option value="<?=$industry['industry_name']?>"><?=$industry['industry_name']?></option>
                            <?php endforeach;?>
						</select>
					</div>
                    <?php endif;?>
					<?php if(isset($locations)):?>
                    <div class="four columns">
						<select onchange="job_filter()" class="chosen-select" name="job_location" style="width:300px" >
							<option value="" >-ALL LOCATION-</option>
                            <?php foreach($locations as $location):?>
                            <option value="<?=$location['country']?>"><?=$location['country']?></option>
                            <?php endforeach;?>
						</select>
					</div>
                    <?php endif;?>
					<div class="one columns">
						<button type="button" onclick="job_filter()" style="height:50px;"><i class="fa fa-search"></i></button>
						<div class="clearfix"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<!-- Recent Jobs -->
	<div class="twelve columns">
		<div class="padding-right">
			<div class="hrm_job_list" style="margin-bottom:40px;">
			</div>
		</div>
	</div>
</div>
<script>
$('.hrm_job_list').load('<?=base_url('site/jobs')?>');
function job_filter()
{
	$.post('<?=base_url('site/jobs/search')?>',$('#job_search').serialize(),function(){
		$('.hrm_job_list').load('<?=base_url('site/jobs')?>');
	});
}
</script>