var labelType, useGradients, nativeTextSupport, animate, tokenId;

(function() {
  var ua = navigator.userAgent,
      iStuff = ua.match(/iPhone/i) || ua.match(/iPad/i),
      typeOfCanvas = typeof HTMLCanvasElement,
      nativeCanvasSupport = (typeOfCanvas == 'object' || typeOfCanvas == 'function'),
      textSupport = nativeCanvasSupport 
        && (typeof document.createElement('canvas').getContext('2d').fillText == 'function');
  //I'm setting this based on the fact that ExCanvas provides text support for IE
  //and that as of today iPhone/iPad current text support is lame
  labelType = (!nativeCanvasSupport || (textSupport && !iStuff))? 'Native' : 'HTML';
  nativeTextSupport = labelType == 'Native';
  useGradients = nativeCanvasSupport;
  animate = !(iStuff || !nativeCanvasSupport);
})();



function init(){
	var st = new $jit.ST({
		levelsToShow : 1,
        injectInto: 'infovis',
        orientation: 'bottom',
        height: 1000,
        width: 1000,
        offsetY: 200,
        duration: 800,
        transition: $jit.Trans.Quart.easeInOut,
        levelDistance: 50,
        Navigation: {
          enable:false,
          panning:true
        },
        Node: {
            height: 110,
            width: 110,
            type: 'ellipse',
            color: '#ff0',
            overridable: true
        },
        Edge: {
            type: 'bezier',
            overridable: true
        },
        onCreateLabel: function(label, node){
            label.id = node.id;            
            label.innerHTML = "<img src='img/tree/"+node.name+".png'>";
            label.onclick = function(){
            	  st.onClick(node.id);
            	  document.getElementById('testId').innerHTML = "<a href='products/"+node.id+"' class='btn btn-info'>"+node.id+"</a>";
            };
            var style = label.style;
            style.width = '110px';
            style.height = '110px';            
            style.cursor = 'pointer';
            style.color = '#000';
            style.fontSize = '0.8em';
            style.textAlign= 'center';
            style.paddingTop = '3px';
        },
        
        onBeforePlotNode: function(node){
            if (node.selected) {
                node.data.$color = "#000";
            }
            else
            {
                node.data.$color = "#ddd";
            }
        },
        
        onBeforePlotLine: function(adj){
            if (adj.nodeFrom.selected && adj.nodeTo.selected) {
                adj.data.$color = "#000";
                adj.data.$lineWidth = 3;
            }
            else {
                delete adj.data.$color;
                delete adj.data.$lineWidth;
            }
        }
    });
	
	
    st.loadJSON(json);
    st.compute();
    st.geom.translate(new $jit.Complex(-200, 0), "current");
    st.onClick(st.root);
    
    var number = document.getElementById('number');
    var search = document.getElementById('search');
    var reset = document.getElementById('reset');
    search.onclick = function() {
        st.onClick(number.value);
    };
    
    reset.onclick = function() {
        st.onClick(st.root);
    };
}
