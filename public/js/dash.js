$(document).ready((function(){$(".counter-value").each((function(){$(this).prop("Counter",0).animate({Counter:$(this).text()},{duration:3500,easing:"swing",step:function(t){$(this).text(Math.ceil(t))}})}))}));
//# sourceMappingURL=dash.js.map