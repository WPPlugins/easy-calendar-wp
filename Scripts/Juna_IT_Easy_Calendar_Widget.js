jQuery(document).ready(function(){

	function Calendar11(id, year, month) {
		var id1=id.split('calendar11_')[1];
		var JIT_CAL_FD=jQuery('#JIT_CAL_FD_'+id1).val();

		var Dlast1 = new Date(year,month+1,0).getDate(),
		D1 = new Date(year,month,Dlast1),
		DNlast1 = new Date(D1.getFullYear(),D1.getMonth(),Dlast1).getDay(),
		DNfirst1 = new Date(D1.getFullYear(),D1.getMonth(),1).getDay(),
		calendar1 = "<tr>",
		month=["January","February","March","April","May","June","July","August","September","October","November","December"];
		if(JIT_CAL_FD=='Sunday')
		{
			if (DNfirst1 != 6) 
			{
			  for(var  i = 0; i < DNfirst1; i++) calendar1 += '<td>';
			}
			else
			{
			  for(var  i = 0; i < 6; i++) calendar1 += '<td>';
			}
		}
		else
		{
			if (DNfirst1 != 0) 
			{
			  for(var  i = 1; i < DNfirst1; i++) calendar1 += '<td>';
			}
			else
			{
			  for(var  i = 0; i < 6; i++) calendar1 += '<td>';
			}
		}
		for(var  i = 1; i <= Dlast1; i++) 
		{

		  if (i == new Date().getDate() && D1.getFullYear() == new Date().getFullYear() && D1.getMonth() == new Date().getMonth()) 
		  {
		    calendar1 += '<td class="without1_'+id1+' today1_'+id1+'">' + i;
		  }
		  else
		  {
		  	if(new Date(D1.getFullYear(),D1.getMonth(),i).getDay() == 0)
		  	{
		    	calendar1 += '<td class="without1_'+id1+' sunday11_'+id1+'">' + i;
		  	}
		  	else if(new Date(D1.getFullYear(),D1.getMonth(),i).getDay() == 6)
		  	{
		    	calendar1 += '<td class="without1_'+id1+' saturday11_'+id1+'">' + i;
		  	}
		  	else
		  	{
		    	calendar1 += '<td class="without1_'+id1+'">' + i;
		  	}
		  }
		  	if(JIT_CAL_FD=='Sunday')
			{
				if (new Date(D1.getFullYear(),D1.getMonth(),i).getDay() == 6) 
				{
				   calendar1 += "<tr>";
				}
			}
			else
			{
				if (new Date(D1.getFullYear(),D1.getMonth(),i).getDay() == 0) 
				{
				   calendar1 += "<tr>";
				}
			}		 
		}
		if(JIT_CAL_FD=='Sunday')
		{
			for(var  i = DNlast1; i < 6; i++) calendar1 += "<td class='JIT_EasyCalank_"+id1+"'>&nbsp;";
		}
		else
		{
			for(var  i = DNlast1; i < 7; i++) calendar1 += "<td class='JIT_EasyCalank_"+id1+"'>&nbsp;";
		}
		document.querySelector('#'+id+' tbody').innerHTML = calendar1;
		document.querySelector('#'+id+' thead td:nth-child(2)').innerHTML = month[D1.getMonth()] +' '+ D1.getFullYear();
		document.querySelector('#'+id+' thead td:nth-child(2)').dataset.month = D1.getMonth();
		document.querySelector('#'+id+' thead td:nth-child(2)').dataset.year = D1.getFullYear();
		if(JIT_CAL_FD=='Sunday')
		{
			if(document.querySelectorAll('#'+id+' tbody tr').length < 7)  // чтобы при перелистывании месяцев не "подпрыгивала" вся страница, добавляется ряд пустых клеток. Итог: всегда 6 строк для цифр
			{  
			    document.querySelector('#'+id+' tbody').innerHTML += "<tr><td class='JIT_EasyCalank_"+id1+"'>&nbsp;<td class='JIT_EasyCalank_"+id1+"'>&nbsp;<td class='JIT_EasyCalank_"+id1+"'>&nbsp;<td class='JIT_EasyCalank_"+id1+"'>&nbsp;<td class='JIT_EasyCalank_"+id1+"'>&nbsp;<td class='JIT_EasyCalank_"+id1+"'>&nbsp;<td class='JIT_EasyCalank_"+id1+"'>&nbsp;";
			}
		}
		else
		{
			if(document.querySelectorAll('#'+id+' tbody tr').length < 6)  // чтобы при перелистывании месяцев не "подпрыгивала" вся страница, добавляется ряд пустых клеток. Итог: всегда 6 строк для цифр
			{  
			    document.querySelector('#'+id+' tbody').innerHTML += "<tr><td class='JIT_EasyCalank_"+id1+"'>&nbsp;<td class='JIT_EasyCalank_"+id1+"'>&nbsp;<td class='JIT_EasyCalank_"+id1+"'>&nbsp;<td class='JIT_EasyCalank_"+id1+"'>&nbsp;<td class='JIT_EasyCalank_"+id1+"'>&nbsp;<td class='JIT_EasyCalank_"+id1+"'>&nbsp;<td class='JIT_EasyCalank_"+id1+"'>&nbsp;";
			}
		}
	}
	jQuery('.JIT_EasyCal').each(function(){
		var JIT_EasyCal_ID=jQuery(this).attr('id');
		var JIT_EasyCal_Prev=jQuery(this).find('.prev11').attr('id');
		var JIT_EasyCal_Month=jQuery(this).find('.month11').attr('id');
		var JIT_EasyCal_Next=jQuery(this).find('.next11').attr('id');
		// переключатель минус месяц
			document.querySelector('#'+JIT_EasyCal_Prev).onclick = function() {
			  Calendar11(JIT_EasyCal_ID, document.querySelector('#'+JIT_EasyCal_Month).dataset.year, parseFloat(document.querySelector('#'+JIT_EasyCal_Month).dataset.month)-1);
			}
		// переключатель плюс месяц
			document.querySelector('#'+JIT_EasyCal_Next).onclick = function() {
			  Calendar11(JIT_EasyCal_ID, document.querySelector('#'+JIT_EasyCal_Month).dataset.year, parseFloat(document.querySelector('#'+JIT_EasyCal_Month).dataset.month)+1);
			}
		Calendar11(JIT_EasyCal_ID,new Date().getFullYear(),new Date().getMonth());
	})	
})
// jQuery(document).ready(function ($) {
//     var JIT_CAL_options = {
//       $AutoPlay: false,
//     };

//     jQuery('.JIT_Cal_Div').each(function(){
//     	var JIT_Cal_Div_ID=jQuery(this).attr('id');
//     	var JIT_CAL_slider = new $JssorSlider$(JIT_Cal_Div_ID, JIT_CAL_options);
//     	var JIT_CAL_Hidden=jQuery(this).find('.JIT_CAL_Hidden').val().split('px')[0];
    
// 	    //responsive code begin
// 	    //you can remove responsive code if you don't want the slider scales while window resizing
// 	    function ScaleSlider() {
// 	        var refSize = JIT_CAL_slider.$Elmt.parentNode.clientWidth;
// 	        if (refSize) {
// 	            refSize = Math.min(refSize, parseInt(JIT_CAL_Hidden));
// 	            JIT_CAL_slider.$ScaleWidth(refSize);
// 	        }
// 	        else {
// 	            window.setTimeout(ScaleSlider, 30);
// 	        }
// 	    }
// 	    ScaleSlider();
// 	    $(window).bind("load", ScaleSlider);
// 	    $(window).bind("resize", ScaleSlider);
// 	    $(window).bind("orientationchange", ScaleSlider);
// 	    //responsive code end
//     })   
// });