function menu(){

	let ul=document.getElementsByTagName('ul')
	for(let i=0;i<ul.length;i++){

	ul[i].style.display='block'}
}
addEventListener('click',function(e){
		if(e.target.innerHTML=="X"){
			e.target.parentNode.parentNode.style.display='none'

		}
		else if(e.target.innerHTML=='Copy Link'){

			let text=document.getElementById('sell')
			let range =document.createRange()
			range.selectNodeContents(text);
			var sel = window.getSelection();
  sel.removeAllRanges();
  sel.addRange(range);
  document.execCommand("copy");
			let show=document.getElementById('copied')
			show.innerHTML='Link Copied'

		}
		
		
})




