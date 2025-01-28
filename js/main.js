$(document).ready(function(){

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	    }
	})

	$('input#filterText').keyup(function(){
		filterText();
	})

	$('div#floatingButtonnn button#updateRec').click(function(){

		let tis = $(this);

		if (confirm("Are you sure you want to update the table?")) {
			submitForm(tis);
		}else {
			alert("Operation Cancelled")
		}
	})

	$('div#floatingButton button').click(function(){

		let tis = $(this);

		if (confirm("You are telling the system that you have paid off HQ Remitances. Continue?")) {
			submitHQForm(tis);
		}else {
			alert("Operation Cancelled")
		}
	})

	$('input#inputFieldLP').keyup(function(){
		var tr = $(this).parent().parent();
		var td = tr.find('td')

		let total = 0;

		td.each( function(index, element) {
			var val = $(element).find('input').val();
			var val = val == "" ? 0 : val;
			if (val != undefined) {
				console.log(val)
				total+= parseInt(val);
			}
		});

		var td = tr.find('td#total').text(total);

	})

	$('div#floatingButtonn button').click(function(){
		let tis = $(this);

		tis.text('Updating...');

		let tr = $('tbody tr')
		let formdata = [];
		tr.each(function(index,element){
			let tmpdata = {};

			var id = $(element).attr('id');
			var ta 		= $(element).find('td#ta input').val();
			var ms 		= $(element).find('td#ms input').val();
			var lp 		= $(element).find('td#lp input').val();
			var bs 		= $(element).find('td#bs input').val();
			var housing = $(element).find('td#housing input').val();
			var pa 		= $(element).find('td#pa input').val();

			tmpdata.loc_id = id == "" ? 0 : id;
			tmpdata.ta = ta == "" ? 0 : ta;
			tmpdata.ms = ms == "" ? 0 : ms;
			tmpdata.lp = lp == "" ? 0 : lp;
			tmpdata.bs = bs == "" ? 0 : bs;
			tmpdata.housing = housing == "" ? 0 : housing;
			tmpdata.pa = pa == "" ? 0 : pa;

			formdata.push(tmpdata);

		})

		$.ajax({
			type: "post",
			data: {data: formdata},
			url: "/dunamis/location-reconsilation",
			success: function(result){
				tis.html('Update');
				alert('Great! Table Has been Updated')
				
			}
		}).catch(function(){
			tis.html('Update');
			alert("Oops! Error Occured. Please refresh the page and try again, or contact Admin")
		})

		console.log(formdata)
	})

	$('input#inputField').keyup(function(){

		let amount = $(this).val();
		let el = $(this).parent();

		let monthAmonth = parseInt(el.prev().text().replace(/,/g, ''));

		let diff = el.next();
		diff.text(monthAmonth - amount)

		let tight = el.next().next();
		calcPercentages(tight, 10, amount)

		let kingdomPractice = el.next().next().next();
		calcPercentages(kingdomPractice, 2, amount)

		let salaries = el.next().next().next().next();
		calcPercentages(salaries, 16, amount)

		let mission = el.next().next().next().next().next();
		calcPercentages(mission, 10, amount)

		let reserves = el.next().next().next().next().next().next();
		calcPercentages(reserves, 5, amount)

		let recurrent = el.next().next().next().next().next().next().next();
		calcPercentages(recurrent, 30, amount)

		let housing = el.next().next().next().next().next().next().next().next();
		calcPercentages(housing, 7, amount)

		let locationProject = el.next().next().next().next().next().next().next().next().next();
		calcPercentages(locationProject, 20, amount)

	})

	function calcPercentages(el, percent, amount)
	{
		let calcAmount = ((percent*amount)/100)

		el.text(calcAmount)
	}

	function filterText() {
	  // Declare variables 
	  var input, filter, table, tr, td, i, txtValue;

	  input = document.getElementById("filterText");

	  filter = input.value.toUpperCase();

	  table = document.getElementById("filterTable");

	  tr = table.getElementsByTagName("tr");

	  // Loop through all table rows, and hide those who don't match the search query
	  	for (i = 0; i < tr.length; i++) {

	    	td = tr[i].getElementsByTagName("td")[0];

		    if (td) {

		      	txtValue = td.textContent || td.innerText;

		      	if (txtValue.toUpperCase().indexOf(filter) > -1) {

		        	tr[i].style.display = "";

		      	} else {

		       	 	tr[i].style.display = "none";

		      	}
		    } 
	  	}
	}

	function submitHQForm(button)
	{
		button.html('Please Wait...');

		$.ajax({
			type: "post",
			url: "/dunamis/accounts-hq-remitance",
			data: {data: true},
			success: function(result){
				button.html('Update');
				location.reload(true)
	  			// alert('Great! System Has been Updated')
			}
		}).catch(function(){
	  		alert("Oops! Error Occured. Please refresh the page and try again, or contact Admin")
	  	})

	}


	function submitForm(button)
	{
		//hide the button and show bootstrap loader
		button.html('Updating...')

		// get table data to be inserted
		let input, filter, table, tr, td;

		let formdata = [];

		table = $("tbody#tbody");

	  	tr = table.find("tr");

	  	tr.each(function(index, tr_element){

	  		let tmpFormdata = {};

	  		var location = $(tr_element).attr('id');

	  		tmpFormdata.location_id = location;
	  		tmpFormdata.locationdata = {};
	  		td = $(tr_element).find('td')

	  		td.each(function(index, td_element){

	  			let Arrkey = $(td_element).attr('id');
			 	let value = $(td_element).text();
	  			if (Arrkey == "monthIncome") {
	  				value = $(td_element).find('input').val();

	  			}
			 	tmpFormdata.locationdata[Arrkey] = value;

	  		})

		 	formdata.push(tmpFormdata);

		 	tmpFormdata = {};
	  	})

	  	console.log(formdata)

	  	$.ajax({
	  		type: "post",
	  		data: {data: formdata},
	  		url: "/dunamis/accounts-reconsilation",
	  		success: function(result){
	  			button.html('Update');
	  			alert('Great! Table Has been Updated')
	  			
	  		}
	  	}).catch(function(){
	  	    button.html('Update');
	  		alert("Oops! Error Occured. Please refresh the page and try again, or contact Admin")
	  	})

	}

})