

document.getElementsByClassName('back')[0].style.display='block';


function re(id){
	let name=('option'+id)
	let first= 'input[name="change"]'
	let res=first.replace('change',name)
      let input=document.querySelectorAll(res)
for(let i=0;i<input.length;i++){
	
	if(input[i].checked==true){
		let options =input[i].value
		document.getElementsByClassName('back')[id-1].style.display='none'
	document.getElementsByClassName('back')[id].style.display='block';

	Cookies.set(name,options, { sameSite: 'strict' })

			break
	}else{
			let ded=('radioalert'+id)
		let al =document.getElementById(ded)
		al.innerText='Please Select Anyone '

	}

}
	
}

function res(id){
	let name=('option'+id)
	let first= 'input[name="change"]'
	let res=first.replace('change',name)
	let input=document.querySelectorAll(res)
	 	
for(let i=0;i<input.length;i++){
	if(input[i].checked==true){
		let options =input[i].value
		Cookies.set(name,options, { sameSite: 'strict' })
	window.location.href='sync.php?submit=Submit'
		let ded=('radioalert'+id)
		let al =document.getElementById(ded)
		al.innerText=''
		break
			
	}else{
			let ded=('radioalert'+id)
		let al =document.getElementById(ded)
		al.innerText='Please Select Anyone '
		
	}

}

	
}

