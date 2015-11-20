
jQuery.noConflict()

jQuery.imageWarp={
	dsettings: {
		warpfactor: 1.5,
		duration: 500, 
		imgopacity: [0.5, 1],
		warpopacity: [0.1, 0.5]
 	},
	warpshells: [],

	refreshoffsets:function($target, warpshell){
		var $offsets=$target.offset()
		warpshell.attrs.x=$offsets.left 
		warpshell.attrs.y=$offsets.top
		warpshell.newattrs.x=warpshell.attrs.x-((warpshell.newattrs.w-warpshell.attrs.w)/2) 
		warpshell.newattrs.y=warpshell.attrs.y-((warpshell.newattrs.h-warpshell.attrs.h)/2)
	},

	addEffect:function($, $target, options){
		var setting={} 
		var setting=jQuery.extend(setting, this.dsettings, options)
		var effectpos=this.warpshells.length
		var attrs={w:$target.outerWidth(), h:$target.outerHeight()}
		var newattrs={w:Math.round(attrs.w*setting.warpfactor), h:Math.round(attrs.h*setting.warpfactor)}
		var $clone=$target.clone().css({position:'absolute', left:0, top:0, visibility:'hidden', border:'1px solid gray'}).appendTo(document.body)
		$target.add($clone).data('pos', effectpos) 
		var $targetlink=$target.parents('a').eq(0)
		this.warpshells.push({$clone:$clone, attrs:attrs, newattrs:newattrs, $link:($targetlink.length==1)? $targetlink : null}) 
		$target.click(function(e){
			var $this=$(this).css({opacity:setting.imgopacity[0]})
			var imageinfo=jQuery.imageWarp.warpshells[$(this).data('pos')]
			jQuery.imageWarp.refreshoffsets($this, imageinfo) 
			if (imageinfo.$link){
				e.preventDefault()
			}
			var $clone=imageinfo.$clone
			$clone.stop().css({left:imageinfo.attrs.x, top:imageinfo.attrs.y, width:imageinfo.attrs.w, height:imageinfo.attrs.h, opacity:setting.warpopacity[0], visibility:'visible'})
			.animate({opacity:setting.warpopacity[1], left:imageinfo.newattrs.x, top:imageinfo.newattrs.y, width:imageinfo.newattrs.w, height:imageinfo.newattrs.h}, setting.duration,
			function(){ 
				$clone.css({left:0, top:0, visibility:'hidden'})
				$this.css({opacity:setting.imgopacity[1]})
			if (imageinfo.$link){
				window.location=imageinfo.$link.attr('href')
			}			
			})
		}) 
	}
};

jQuery.fn.imageWarp=function(options){
	var $=jQuery
	return this.each(function(){ 
		var $imgref=$(this)
		if (this.tagName!="IMG")
			return true 
		if (parseInt($imgref.css('width'))>0 && parseInt($imgref.css('height'))>0){ 
			jQuery.imageWarp.addEffect($, $imgref, options)
		}
		else if (this.complete){ 
			jQuery.imageWarp.addEffect($, $imgref, options)
		}
		else{
			$(this).bind('load', function(){
				jQuery.imageWarp.addEffect($, $imgref, options)
			})
		}
	})
};