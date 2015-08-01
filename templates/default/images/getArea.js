var   xmlDoc;   
var   nodeIndex; 
function   getxmlDoc()   
{   
  xmlDoc=new   ActiveXObject("Microsoft.XMLDOM");   
	  var   currNode;   
	  xmlDoc.async=false;   
	  xmlDoc.load("../../area.xml");   
	  if(xmlDoc.parseError.errorCode!=0)   
	  {   
			  var   myErr=xmlDoc.parseError;   
			  alert("出错！"+myErr.reason);   
	  }           
}
function Init()
{
//打开xlmdocm文档
getxmlDoc();
var   dropElement1=document.getElementById("sheng"); 
var   dropElement2=document.getElementById("shi"); 
var   dropElement3=document.getElementById("xian");   
RemoveDropDownList(dropElement1);
RemoveDropDownList(dropElement2);
RemoveDropDownList(dropElement3);
var  TopnodeList=xmlDoc.selectSingleNode("address").childNodes;
if(TopnodeList.length>0)
{
	//省份列表
	var country;
	var province;
	var city;
	for(var   i=0; i<TopnodeList.length;   i++)
	{
		  //添加列表项目
		  country=TopnodeList[i];       
		  var   eOption=document.createElement("option");   
		  eOption.value=country.getAttribute("name");
		  eOption.text=country.getAttribute("name");
		  if (S_province == country.getAttribute("name")){
			eOption.selected = 'true';
			sheng_index = i;
		  }
		  dropElement1.add(eOption);
	}
	if(TopnodeList[sheng_index].childNodes.length>0)
	{
		//城市列表
		for(var i=0;i<TopnodeList[sheng_index].childNodes.length;i++)
		{
		   var   id=dropElement1.options[sheng_index].value;
		   //默认为第一个省份的城市
		  
		   province=TopnodeList[sheng_index]; 
		   var   eOption=document.createElement("option");  
		   eOption.value=province.childNodes[i].getAttribute("name");   
		   eOption.text=province.childNodes[i].getAttribute("name"); 
		   if (S_city == province.childNodes[i].getAttribute("name")){
				eOption.selected = 'true';
				shi_index = i;
		   }  
		   dropElement2.add(eOption);
		}
		if(TopnodeList[sheng_index].childNodes[shi_index].childNodes.length>0)
		{
		   //县列表
		   for(var i=0;i<TopnodeList[sheng_index].childNodes[shi_index].childNodes.length;i++)
		   {
			  var   id=dropElement2.options[shi_index].value;
			  //默认为第一个城市的第一个县列表
			  city=TopnodeList[sheng_index].childNodes[shi_index];  
			  var   eOption=document.createElement("option");  
			  eOption.value=city.childNodes[i].getAttribute("name");   
			  eOption.text=city.childNodes[i].getAttribute("name"); 
			  if (S_xian == city.childNodes[i].getAttribute("name")){
					eOption.selected = 'true';
			  }    
			  this.document.getElementById("xian").add(eOption);
		   }
		}
	}
}
}   
function   selectCity()   
{       var   dropElement1=document.getElementById("sheng"); 
	  var   name=dropElement1.options[dropElement1.selectedIndex].value;
	  //alert(id);
	  var   countryNodes=xmlDoc.selectSingleNode('//address/province [@name="'+name+'"]');   
	  //alert(countryNodes.childNodes.length); 
	  var   province=document.getElementById("shi");       
	  var   city=document.getElementById("xian");       
	  RemoveDropDownList(province);   
	  RemoveDropDownList(city);
	  if(countryNodes.childNodes.length>0)
	  {
		   //填充城市          
		   for(var   i=0;   i<countryNodes.childNodes.length;   i++)   
		   {   
			  var   provinceNode=countryNodes.childNodes[i];     
			  var   eOption=document.createElement("option");   
			  eOption.value=provinceNode.getAttribute("name");   
			  eOption.text=provinceNode.getAttribute("name");   
			  province.add(eOption);   
		   }
		   if(countryNodes.childNodes[0].childNodes.length>0)
		   {
			  //填充选择省份的第一个城市的县列表
			  for(var i=0;i<countryNodes.childNodes[0].childNodes.length;i++)
			  {
				  //alert("i="+i+"\r\n"+"length="+countryNodes.childNodes[0].childNodes.length+"\r\n");
				  var   dropElement2=document.getElementById("shi"); 
				  var   dropElement3=document.getElementById("xian"); 
				  //取当天省份下第一个城市列表
				  var cityNode=countryNodes.childNodes[0];
				  //alert(cityNode.childNodes.length); 
				  var   eOption=document.createElement("option");  
				  eOption.value=cityNode.childNodes[i].getAttribute("name");   
				  eOption.text=cityNode.childNodes[i].getAttribute("name");   
				  dropElement3.add(eOption);
			  }
		   }
	  }
}   
function   selectCountry()   
{   
	  var   dropElement2=document.getElementById("shi");   
	  var   name=dropElement2.options[dropElement2.selectedIndex].value;   
	  var   provinceNode=xmlDoc.selectSingleNode('//address/province/city[@name="'+name+'"]');   
	  var   city=document.getElementById("xian");       
	  RemoveDropDownList(city);   
	  for(var   i=0;   i<provinceNode.childNodes.length;   i++)   
	  {   
			  var   cityNode=provinceNode.childNodes[i];     
			  var   eOption=document.createElement("option");   
			  eOption.value=cityNode.getAttribute("name");   
			  eOption.text=cityNode.getAttribute("name");   
			  city.add(eOption);   
	  }   
}   
function   RemoveDropDownList(obj)   
{   
  if(obj)
  {
	  var   len=obj.options.length;   
	  if(len>0)
	  {
		//alert(len);   
		for(var   i=len;i>=0;i--)   
		{   
			  obj.remove(i);   
		}
	  }
   }
		
}   