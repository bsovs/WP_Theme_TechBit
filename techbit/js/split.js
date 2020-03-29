document.addEventListener('DOMContentLoaded', function(){
  let wrapper = document.getElementById('wrapper');
  let topLayer = wrapper.querySelector('.top');
  let handle = wrapper.querySelector('.handle');
  let arrowLeft = wrapper.querySelector('.splitButtonLeft');
  let arrowRight = wrapper.querySelector('.splitButtonRight');
  let skew = 0;
  let delta = 0;

  if(wrapper.className.indexOf('skewed') != -1){
    skew = 1410;
  }
  
  var target = window.innerWidth/1.5;
  var number = 0;
  var interval = setInterval(function(){ 
        if (number >= target) clearInterval(interval);
        number+=2;

		delta = ((window.innerWidth-number));
		handle.style.left = delta + 'px';
		arrowLeft.style.left = delta + 160 + 'px';
		arrowRight.style.left = delta + 205 + 'px';
		topLayer.style.width = skew + delta + 'px';
  }, 5);
  
  let onMouseMove;
	wrapper.addEventListener('mousedown', function(){wrapper.addEventListener('mousemove', onMouseMove = (e) => { 
		delta = (e.clientX - window.innerWidth / 2) * 0.5;
		handle.style.left = e.clientX + delta + 'px';
		arrowLeft.style.left = e.clientX + delta + 160 + 'px';
		arrowRight.style.left = e.clientX + delta + 205 + 'px';
		topLayer.style.width = e.clientX + skew + delta + 'px';
	})});
	
	wrapper.addEventListener('mouseup', function(){
		wrapper.removeEventListener('mousemove', onMouseMove);
	});
	
	wrapper.ondragstart = function() {
		return false;
	};

});