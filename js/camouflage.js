$.fn.effectize = function(opts) {

		mee=$(this);
		numm=mee.children().get();
		slength=numm.length;
		
		if (slength < 1) {
            if (window.console && window.console.log)
                window.console.log('terminating; too few slides: ' + slength);
            return;
        }
		
		for(i=0;i<slength;i++)	
		{
			if( jQuery.trim($(numm[i]).html()) =='')
			{
				$(numm[i]).remove();
			}else{
				$(numm[i]).css('opacity','0');
			}
			
		}
		last=slength-1;
		//mee.css('opacity','0');
		tm=opts.timeout;
		
		//for(i=last;i>=0;i--)
		for(i=0;i<slength;i++)
		{	
			
			tm+=opts.speed;
			numm=mee.children().get();
			eend=$(numm[i]);
			//p=window.setTimeout(function(){
			
			if(opts.direction=='vertical')
			{
				h=eend.height();
				eend.height(30);
				eend.animate({opacity: 1,height: h},tm,opts.easing,function(){if($.browser.msie) this.style.removeAttribute("filter");});
			}else{
				h=eend.width();
				eend.width(30);
				eend.animate({opacity: 1,width: h},tm,opts.easing,function(){if($.browser.msie) this.style.removeAttribute("filter");});
			}
			
			
			//}, tm );
		}

}
