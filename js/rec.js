function createXmlHttp() {
    var xmlHttp = null;

    try {
        //Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        //IE
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }

    return xmlHttp;
}
//验证学号
function checkNum() {
  if(form1.snum.value.length<6 || form1.snum.value.length.length==16){   
      divSnum.innerHTML='<font class="tips_false">学号长度必须大于或等于6位</font>';
      return false;
  }else{
        var xmlHttp=createXmlHttp();
        if(!xmlHttp){
            alert('你的浏览器不支持ajax！');
            return 0;
        }
        var url='checkNum.php';
        postDate="snum="+document.getElementById("snum").value;
        xmlHttp.open("post",url,true);
        xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlHttp.onreadystatechange = function() {
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                if (xmlHttp.responseText=='1'){
                    divSnum.innerHTML="&nbsp&nbsp学号已经被注册，请重新输入";
                    divSnum.style.color='red';
                  return false;
                }else{
                    divSnum.innerHTML="&nbsp&nbsp学号可以注册";
                    divSnum.style.color='green';
                  return true;
                }
            }
        }
        xmlHttp.send(postDate);
  }
}
//验证姓名
function checkna(){
  na=form1.sname.value;
  if( na.length <2 || na.length >12)  
    {  	
        divname.innerHTML='<font class="tips_false">姓名长度必须为2~12个字符</font>';
        return false;
    }else{  
        divname.innerHTML='<font class="tips_true">输入正确</font>';
       
    }  
}
//验证密码 
function checkpsd1(){    
  psd1=form1.pwd.value;
  var flagZM=false ;
  var flagSZ=false ; 
  if(psd1.length<6 || psd1.length>16){   
      divpassword1.innerHTML='<font class="tips_false">长度错误，密码长度应为6-16</font>';
      return false;
  }
  else
      {
        for(i=0;i < psd1.length;i++)
          {
              if((psd1.charAt(i) >= 'A' && psd1.charAt(i)<='Z') || (psd1.charAt(i)>='a' && psd1.charAt(i)<='z'))
              {
                  flagZM=true;
              }
              else if(psd1.charAt(i)>='0' && psd1.charAt(i)<='9')
              {
                  flagSZ=true;
              }
          }
          if(!flagZM||!flagSZ){
              divpassword1.innerHTML='<font class="tips_false">密码必须是字母数字的组合</font>';
              return false;
          }else{
              divpassword1.innerHTML='<font class="tips_true">输入正确</font>';
          }
      }
}
//验证确认密码 
function checkpsd2(){ 
  if(form1.pwd2.value.length<6 || form1.pwd2.value.length>16){   
      divpassword2.innerHTML='<font class="tips_false">长度错误，密码长度应为6-16</font>';
      return false;
  }else{
      if(form1.pwd.value!=form1.pwd2.value) {
           divpassword2.innerHTML='<font class="tips_false">您两次输入的密码不一样</font>';
           return false;
      } else { 
           divpassword2.innerHTML='<font class="tips_true">输入正确</font>';
      }
      }
}

//验证邮箱
function checkmail(){
  apos=form1.email.value.indexOf("@");
  dotpos=form1.email.value.lastIndexOf(".");
  if (apos<1||dotpos-apos<2) {
      divmail.innerHTML='<font class="tips_false">输入错误</font>' ;
      return false;
  }else {
              divmail.innerHTML='<font class="tips_true">输入正确</font>' ;
  }
}
function checkSubmit(){
  if(checkmail()&&checkna()&&checkNum()&&checkpsd1()&&checkpsd2()){
      alert("注册信息有误，请重新检查注册信息！");
      return false;
  }
}
//提交表单按钮检查
function checkSubmit(){
	//账号长度
    if(form1.snum.value.length<6 || form1.snum.value.length.length==16){   
          alert("注册信息有误，请检查输入的内容！");
          return false;
      }
      na=form1.sname.value;
      if( na.length <2 || na.length >12)  
        {  	
            alert("注册信息有误，请检查输入的内容！");
            return false;
        }
        psd1=form1.pwd.value;
      var flagZM=false ;
      var flagSZ=false ; 
    if(psd1.length<6 || psd1.length>16){   
        alert("注册信息有误，请检查输入的内容！");
        return false;
    }else{
            for(i=0;i<psd1.length;i++)
            {
                if((psd1.charAt(i) >= 'A' && psd1.charAt(i)<='Z') || (psd1.charAt(i)>='a' && psd1.charAt(i)<='z'))
                {
                    flagZM=true;
                }
                else if(psd1.charAt(i)>='0' && psd1.charAt(i)<='9'){
                    flagSZ=true;
                }
            }
            if(!flagZM||!flagSZ){
				alert("注册信息有误，请检查输入的内容！");
                return false;
            }
        }
    if(form1.pwd2.value.length<6 || form1.pwd2.value.length>16){   
        alert("注册信息有误，请检查输入的内容！");
        return false;
    }else{
        if(form1.pwd.value!=form1.pwd2.value) {
            alert("注册信息有误，请检查输入的内容！");
            return false;
        }
    }
    apos=form1.email.value.indexOf("@");
    dotpos=form1.email.value.lastIndexOf(".");
    if (apos<1||dotpos-apos<2) {
        alert("注册信息有误，请检查输入的内容！");
        return false;
    }
}