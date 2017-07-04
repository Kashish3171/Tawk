var createaccount=document.getElementsByClassName('createaccount');
createaccount[0].addEventListener('click',function(){
	var signupform=document.getElementById('signupform');
	var name=signupform.elements[0].value;
	var email=signupform.elements[1].value;
	var password=signupform.elements[2].value;
	signuphandler(name,email,password);

});
var div =document.createElement('div');
			div.classList.add('alert','alert-info');
		
function signuphandler(name,email,password)
{  
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open('POST','signuphandler.php');
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange=function()
	{
		if(this.status==200 && this.readyState==4)
		{   
			
			div.innerHTML=this.responseText;
			document.getElementsByClassName('output')[0].appendChild(div);
		}
	}
	xmlhttp.send('name=' + name + '&email='+email + '&password=' + password);
	
}

