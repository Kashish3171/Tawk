
document.getElementsByClassName('logout')[0].addEventListener('click',function(){
	console.log('i m executed');
	var ds =new XMLHttpRequest();
	ds.onreadystatechange=function()
	{
		if(this.readyState==4 && this.status==200)
		{	alert(this.responseText);
			window.setTimeout(function(){window.location.href='index.php'},500);
		}
	}
	ds.open('GET',"logout.php");
	ds.send();

});