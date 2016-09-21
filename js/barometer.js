var needle = document.getElementById('needle');
var angle = 180;
var currentAngle = 180;
var currentValue = 0;
TweenMax.to(needle, 3, {css:{rotation:angle,ease:Elastic.easeOut}});

$(document).delegate('.baro_char', 'click', function(e){
  var element = $(this);
  var id = $(this).attr('id');
  
  switch(id){
    case "p5":
	  currentValue = 5;
	  document.getElementById("show_number").innerHTML = "+" + currentValue;
      TweenMax.to(needle, 0.5 , {css:{rotation:angle+90}});
	  currentAngle = angle+90;
      break;
    case "p4":
	  currentValue = 4;
	  document.getElementById("show_number").innerHTML = "+" + currentValue;
      TweenMax.to(needle, 0.5, {css:{rotation:angle+72}});
	  currentAngle = angle+72;
      break;
    case "p3":
	  currentValue = 3;
	  document.getElementById("show_number").innerHTML = "+" + currentValue;
      TweenMax.to(needle, 0.5, {css:{rotation:angle+54}});
	  currentAngle = angle+54;
      break;
    case "p2":
	  currentValue = 2;
	  document.getElementById("show_number").innerHTML = "+" + currentValue;
      TweenMax.to(needle, 0.5, {css:{rotation:angle+36}});
	  currentAngle = angle+36;
      break;
    case "p1":
	  currentValue = 1;
	  document.getElementById("show_number").innerHTML = "+" + currentValue;
      TweenMax.to(needle, 0.5, {css:{rotation:angle+18}});
	  currentAngle = angle+18;
      break;
    case "zero":
	  currentValue = 0;
	  document.getElementById("show_number").innerHTML = currentValue;
      TweenMax.to(needle, 0.5, {css:{rotation:angle}});
	  currentAngle = angle;
      break;
    case "n1":
	  currentValue = -1;
	  document.getElementById("show_number").innerHTML = currentValue;
      TweenMax.to(needle, 0.5, {css:{rotation:angle-18}});
	  currentAngle = angle-18;
      break;
    case "n2":
	  currentValue = -2;
	  document.getElementById("show_number").innerHTML = currentValue;
      TweenMax.to(needle, 0.5, {css:{rotation:angle-36}});
	  currentAngle = angle-36;
      break;
    case "n3":
	  currentValue = -3;	
	  document.getElementById("show_number").innerHTML = currentValue;
      TweenMax.to(needle, 0.5, {css:{rotation:angle-54}});
	  currentAngle = angle-54;
      break;
    case "n4":
	  currentValue = -4;
	  document.getElementById("show_number").innerHTML = currentValue;
      TweenMax.to(needle, 0.5, {css:{rotation:angle-72}});
	  currentAngle = angle-72;
	  
      break;
    case "n5":
	  currentValue = -5;
	  document.getElementById("show_number").innerHTML = currentValue;
      TweenMax.to(needle, 0.5, {css:{rotation:angle-90}});
	  currentAngle = angle-90;
      break;
	case "plus":
	 if(currentAngle<270){
	  currentValue = currentValue+1;
	  if(currentValue>0){
	  document.getElementById("show_number").innerHTML = "+" + currentValue;
	  }else{
	  document.getElementById("show_number").innerHTML = currentValue;
	  }
      TweenMax.to(needle, 0.5, {css:{rotation:currentAngle+18}});
	  currentAngle = currentAngle+18;}  
      
      break;
	case "minus":
	if(currentAngle>90){
	  currentValue = currentValue-1;  
	  if(currentValue>0){
	  document.getElementById("show_number").innerHTML = "+" + currentValue;
	  }else{
	  document.getElementById("show_number").innerHTML = currentValue;
	  }
	  document.getElementById("minus").addEventListener("click", function(){
      score = (score.value = currentValue-1);
      });
      TweenMax.to(needle, 0.5, {css:{rotation:currentAngle-18}});
	  currentAngle = currentAngle-18;
	  }	  
      break;
  }
  var score = document.getElementById("score");
  score = (score.value = currentValue);
});

