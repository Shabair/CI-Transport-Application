(function(c){var k={init:function(a){var b={color:c(this).css("background-color"),reach:20,speed:1E3,pause:0,glow:!0,repeat:!0,onHover:!1};c(this).css({"-moz-outline-radius":c(this).css("border-top-left-radius"),"-webkit-outline-radius":c(this).css("border-top-left-radius"),"outline-radius":c(this).css("border-top-left-radius")});a&&c.extend(b,a);b.color=c("<div style='background:"+b.color+"'></div>").css("background-color");!0!==b.repeat&&!isNaN(b.repeat)&&0<b.repeat&&(b.repeat-=1);return this.each(function(){b.onHover?
c(this).bind("mouseover",function(){g(b,this,0)}).bind("mouseout",function(){c(this).pulsate("destroy")}):g(b,this,0)})},destroy:function(){return this.each(function(){clearTimeout(this.timer);c(this).css("outline",0)})}},g=function(a,b,d){var e=a.reach;d=d>e?0:d;var h=(e-d)/e,f=a.color.split(","),h="rgba("+f[0].split("(")[1]+","+f[1]+","+f[2].split(")")[0]+","+h+")",f={outline:"2px solid "+h};a.glow&&(f["box-shadow"]="0px 0px "+parseInt(d/1.5)+"px "+h);f["outline-offset"]=d+"px";c(b).css(f);b.timer&&
clearTimeout(b.timer);b.timer=setTimeout(function(){if(d>=e&&!a.repeat)return c(b).pulsate("destroy"),!1;if(d>=e&&!0!==a.repeat&&!isNaN(a.repeat)&&0<a.repeat)a.repeat-=1;else if(a.pause&&d>=e)return l(a,b,d+1),!1;g(a,b,d+1)},a.speed/e)},l=function(a,b,c){innerfunc=function(){g(a,b,c)};b.timer=setTimeout(innerfunc,a.pause)};c.fn.pulsate=function(a){if(k[a])return k[a].apply(this,Array.prototype.slice.call(arguments,1));if("object"!==typeof a&&a)c.error("Method "+a+" does not exist on jQuery.pulsate");
else return k.init.apply(this,arguments)}})(jQuery);