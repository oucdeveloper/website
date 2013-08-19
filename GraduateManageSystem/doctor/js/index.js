var markArray = new Array(0,0,0,0);

window.onload= function()
{
	for(var i = 0;i<4;i++)
	{
		var obj = document.getElementById("menu"+i);
		obj.style.display = "none";
	}
}

function menuClick(menuNum) 
{

	for(var i = 0;i<4;i++)
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