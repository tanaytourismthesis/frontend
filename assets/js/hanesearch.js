
$(function(){
  var slider = document.getElementById("est_price");
  var output = document.getElementById("priceLabel");
  output.innerHTML = 'Php' +' ' +  slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
  slider.oninput = function() {
    output.innerHTML = 'Php' +' ' + this.value;
  }
});
