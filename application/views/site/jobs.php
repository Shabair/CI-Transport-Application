<?php echo $this->pagination->create_links(); ?>
<ul class="job-list full">
	<?php if(count($records)>0):?>
	<?php foreach($records as $record): ?>
    <li>
        <a href="jobs/<?=$this->functions->cleanURl($record['title'])?>-<?php echo $record['job_id']; ?>">
            <div class="job-list-content">
                <h4>
                <?=$record['title']?>
                <span class="full-time"><?=$record['job_status']?></span>
                </h4>
                <div class="job-icons">
                    <span><i class="fa fa-industry"></i><?=$record['industry']?></span>
                    <span><i class="fa fa-map-marker"></i><?=ucfirst($record['city']).' , '.ucfirst($record['country']);?></span>
                    <span><i class="fa fa-calendar"></i><?=$record['date']?></span>
                </div>
                <span style="font-size:14px; font-weight:400;"><?=substr($record['description'], 0, 90); ?></span>
            </div>
        </a>
        <div class="clearfix"></div>
    </li>
    <?php endforeach; ?>
    <?php else:?>
    <li>No Job Found</li>
    <?php endif;?>						
</ul>
<div class="clearfix"></div>
<script>
$('.pagination li a').click(function(e){
	$('.hrm_job_list').load($(this).attr('href'));
	e.preventDefault(); 
});
</script>