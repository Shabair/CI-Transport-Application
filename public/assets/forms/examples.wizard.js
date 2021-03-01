/*
Name: 			Forms / Wizard - Examples
Written by: 	Okler Themes - (http://www.okler.net)
Edit by:		Awais Mahmood - WebDeveloper
Theme Version: 	1.4.2
*/




(function( $ ) {

	'use strict';
	/*
	Wizard #4
	*/
	var $w4finish = $('#w4').find('ul.pager li.finish'),
		$w4validator = $("#w4 form").validate({
		highlight: function(element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function(element) {
			$(element).closest('.form-group').removeClass('has-error');
			$(element).remove();
		},
		errorPlacement: function( error, element ) {
			var placement = element.closest('.input-group');
			if (!placement.get(0)) {
				placement = element;
			}
			if (error.text() !== '') {
				placement.after(error);
			}
		}
	});

jQuery.validator.addMethod("emphistodate", function(value, element) {

  					var one_day=1000*60*60*24; // get the day in miliseconds
  					// remove the  employment_to_date_ from getting id 
  					var i = element.id.replace('employment_to_date_',''); 
					var emphisPreToDate  = value;
					//convert to milisecods
					emphisPreToDate = new Date(emphisPreToDate);
					var emphisPreToDate = emphisPreToDate.getTime();
					

					var currentDate = new Date();
					currentDate = currentDate.getTime();

					// the input in to date less than current date
					if(emphisPreToDate >= currentDate){ 
						$w4validator.focusInvalid();
						return false;
					}else if(i == 1){
						return true;
					}


					// get the employer next history date
					var emphisNextDate =  $("input[name=employment_fron_date_"+(i-1)+"]").val();
					emphisNextDate = new Date(emphisNextDate);
					var emphisNextDate = emphisNextDate.getTime();
					

					var diff = emphisNextDate - emphisPreToDate;

					diff = Math.round(diff/one_day);
					
					// if difference b/w two date greater than 30 than error
					if(diff >= 30 || diff < 0){
						$w4validator.focusInvalid();
						return false;
					}
					return true;

}, "Less than max 30 days from previous history or Current Date");


jQuery.validator.addMethod("emphisfromdate", function(value, element) {

  					var one_day=1000*60*60*24; // get the day in miliseconds
  					// remove the  employment_to_date_ from getting id 
  					var i = element.id.replace('employment_fron_date_',''); 
					var emphisPreFromDate  = value;
					//convert to milisecods
					emphisPreFromDate = new Date(emphisPreFromDate);
					var emphisPreFromDate = emphisPreFromDate.getTime();
					

					/* Check if the From date less than to date*/
					var emphisPreToDate =  $("input[name=employment_to_date_"+i+"]").val();
					emphisPreToDate = new Date(emphisPreToDate);
					var emphisPreToDate = emphisPreToDate.getTime();

					var diff = emphisPreToDate - emphisPreFromDate;
					diff = Math.round(diff/one_day);
					if(diff <= 30 || diff < 0){
						$w4validator.focusInvalid();
						$("input[name=employment_fron_date_"+i+"]").focus();
						return false;
					}
					/**/

					
					return true;

}, "min 30 days employment in a company");

	$('#w4').bootstrapWizard({
		tabClass: 'wizard-steps',
		nextSelector: 'ul.pager li.next',
		updateAndClose: 'ul.pager li.updateAndClose',
		previousSelector: 'ul.pager li.previous',
		firstSelector: null,
		lastSelector: null,
		onNext: function( tab, navigation, index, newindex ) {
			var validated = $('#w4 form').valid();
			if( !validated ) {
				$w4validator.focusInvalid();
				return false;
			}
			var currentTab = tab.find('a').attr('href');
			if(currentTab == '#w6-employment_history'){
				var noEmploymentHis = $("input[name=prv_empl_his_no]").val();
				for(var i=1;i <= noEmploymentHis;i++){

						// $("#employment_to_date_"+i).focus();	
						jQuery( "#employment_to_date_"+i ).rules( "add", {
						    emphistodate:true,
						});	

						jQuery( "#employment_fron_date_"+i ).rules( "add", {
						    emphisfromdate:true,
						});					
					
				}

				var validated = $('#w4 form').valid();
				if( !validated ) {
					$w4validator.focusInvalid();
					return false;
				}
			}
			

			// return true;
		},
		onTabClick: function( tab, navigation, index, newindex ) {
			if ( newindex == index + 1 ) {
				return this.onNext( tab, navigation, index, newindex);
			} else if ( newindex > index + 1 ) {
				var validated = $('#w4 form').valid();
				if( !validated ) {
					$w4validator.focusInvalid();
					return false;
				}else{
					return true;
				}
			} else {
				var validated = $('#w4 form').valid();
				if( !validated ) {
					$w4validator.focusInvalid();
					return false;
				}else{
					return true;
				}
			}
		},
		onTabChange: function( tab, navigation, index, newindex ) {
			var $total = navigation.find('li').size() - 1;
			$w4finish[ newindex != $total ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('#w4').find(this.nextSelector)[ newindex == $total ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('#w4').find(this.updateAndClose)[ newindex == $total ? 'addClass' : 'removeClass' ]( 'hidden' );
		},
		onTabShow: function( tab, navigation, index ) {
			var $total = navigation.find('li').length - 1;
			var $current = index;
			var $percent = Math.floor(( $current / $total ) * 100);
			$('#w4').find('.progress-indicator').css({ 'width': $percent + '%' });
			tab.prevAll().addClass('completed');
			tab.nextAll().removeClass('completed');
		}
	});

}).apply( this, [ jQuery ]);
