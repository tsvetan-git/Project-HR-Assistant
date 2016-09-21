<link rel="stylesheet" href="css/barometer.css">
<div style=" margin-left: 100px; margin-right: 100px; margin-top: 60px; width: 500px; height: 500px; position: relative; display: inline-block">

  <img src="images/polar-cirkel-color.png" id="gradient" style="width: 100%; position: absolute; left: 0px; top: 0px; z-index: 1;">
  <img src="images/polar-cirkel.png" id="needle" style="width: 100%; position: absolute; left: 0px; top: 0px; z-index: 2;">
  <img src="images/polar_overlay.png" id="overlay" style="width: 100%; position: absolute; left: 0px; top: 0px; z-index: 3;">
  
  <span id="n5" class="baro_char">-5</span>
  <span id="n4" class="baro_char">-4</span>
  <span id="n3" class="baro_char">-3</span>
  <span id="n2" class="baro_char">-2</span>
  <span id="n1" class="baro_char">-1</span>
  <span id="zero" class="baro_char">0</span>
  <span id="p1" class="baro_char">+1</span>
  <span id="p2" class="baro_char">+2</span>
  <span id="p3" class="baro_char">+3</span>
  <span id="p4" class="baro_char">+4</span>
  <span id="p5" class="baro_char">+5</span>
  
  <span id="show_number">0</span>
  
  <span id="plus" class="baro_char"><img src="images/plus-icon.png"></span>
  <span id="minus" class="baro_char"><img src="images/minus-icon.png"></span>
</div>


<script src="js/ajax/jquery.min.js"></script>
<script src="js/ajax/TweenMax.min.js"></script>
<script src="js/ajax/Draggable.min.js"></script>
<script src="js/ajax/ThrowPropsPlugin.min.js"></script>
<script src="barometer.js"></script>
