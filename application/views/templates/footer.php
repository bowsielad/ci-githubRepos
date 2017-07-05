
  

</div><!-------End Wrapper ---------->


<script>
        CKEDITOR.replace( 'editor1' );
		
<!--// Show and hide divs //-->

function _(x){
	return document.getElementById(x);
}

function toggleElement(x) {
    var x = _(x);
    if (x.style.display === 'block') {
        x.style.display = 'none';
		document.getElementById("blueArrow").removeAttribute('class', 'rotate');
		
		
	} else {
        x.style.display = 'block';
		document.getElementById("blueArrow").setAttribute('class', 'rotate');
		
    }
}
		
</script>
            
            
</body>
</html>