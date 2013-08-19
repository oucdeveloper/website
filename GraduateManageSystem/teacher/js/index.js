var markArray = new Array(0,0,0,0,0);

window.onload= function()
{
	for(var i = 0;i<5;i++)
	{
		var obj = document.getElementById("menu"+i);
		obj.style.display = "none";
	}

	
}
window.onload= function()
{	
     var tr_num=document.getElementsByTagName("tr");
	 for(var i=0;i<tr_num.length;i++){
		 var td_num= tr_num[i].childNodes;
		 td_num[1].style.backgroundColor="#FC6";
		 td_num[5].style.backgroundColor="#FC6";
		 td_num[3].style.backgroundColor="#bbb";
		 td_num[7].style.backgroundColor="#bbb";
		 //alert(td_num.length);
		 }
	//alert(tr_num.length);
	}
function menuClick(menuNum) 
{

	for(var i = 0;i<5;i++)
	{
		var obj = document.getElementById("menu"+i);
		if(menuNum==i && markArray[menuNum]==0)
		{
			obj.style.display = "";
			markArray[menuNum] = 1;

		}
		else
		{
			obj.style.display = "none";
			markArray[i] = 0;
		}
	}
}