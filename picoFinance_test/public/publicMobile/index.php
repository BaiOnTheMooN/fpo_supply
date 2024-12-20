<!DOCTYPE html>
<html lang="en">
   <head>
      <title>ค้นหาข้อมูล</title>
      <meta charset="utf-8">
      <meta name="keywords" content="FIDP" /> 
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <link rel="stylesheet" type="text/css" href="css/publicMobile.css">
   </head>
   <script src="js/data.js?v=<?php echo time(); ?>"></script>
   <script src="js/pv.js"></script>
   <body>
      <div id="newsPage">ประกาศข่าว 
         <div id="closenews" onclick="closeNewsPage();">x 
         </div>
      </div>
      <div id="firstPage">
      <div id="backhome">
                     <button class="bttn2" onclick="fp()">กลับไปค้นหา</button>
                     </div>
         <div class="container" id="container">
            <div class="logo">
               <a href="http://1359.go.th/"><img src = "images/logo.png" width= "120px" height="120px"></a>
               <div class="text1" id="text1"> 
                  <p style = "color:white;font-size:20px;">รายชื่อผู้ประกอบธุรกิจสินเชื่อรายย่อยระดับจังหวัดภายใต้การกำกับ</p>
                  <p style = "color:white;font-size:20px;"> (สินเชื่อพิโกไฟแนนซ์) ที่เปิดดำเนินการ</p>
               </div>
               <div id="formGroup0">
                  <div class="selectclass">    
                     <select class="old-select" id="selecttype" style="width:200px; height:50px; font-size: 19px; text-align-last:center;" > 
                     <option value="0">ค้นหาชื่อบริษัท</option>
                     <option value="1">ค้นหาจังหวัด</option>
                     </select><br>
                     <button class="button0" style="vertical-align:middle" OnClick="sendType()";><span>ค้นหา</span></button><br>
                  </div>
               </div>
               <div id="formGroup1">
                     <div class="text2" id="text2">
                         <p style="color:white;font-size:20px;">ค้นหาผู้ประกอบการพิโกไฟแนนซ์</p>
                     </div>
                     <input type="text" id="searchcompany"  style="vertical-align:middle" placeholder="ค้นหาชื่อบริษัท"><br>
                     <button class="button0" style="vertical-align:middle" OnClick="searchClick(1)";><span>ค้นหา</span></button><br>
               </div>
               <div id="formGroup2">
                     <div class="text2" id="text2">
                     <p style="color:white;font-size:20px;">ค้นหาผู้ประกอบการพิโกไฟแนนซ์</p>
                  </div>
                  <select  class="old-select" id="pvSelect" style="width:200px; height:50px; font-size: 19px; text-align-last:center;" ></select>
                  <br>
                  <br>
                  <button class="button0" style="vertical-align:middle" OnClick="searchClick(0)";><span>ค้นหา</span></button><br>
               </div>
            </div>
          </div>
          <footer class="flex-rw" id="contact">
             <ul>
                <a target="_blank"  href="https://1359.go.th/fidp/index.php" id="link0"><p style="color:white;font-size: 80%">สำนักนโยบายพัฒนาระบบการเงินภาคประชาชน</p></a>
                <p style="color:white;font-size: 80%">สำนักงานเศรษฐกิจการคลัง กระทรวงการคลัง เลขที่ 73 <br> อาคารธุรกิจบัณฑิต ชั้น 4 ถ.พระรามที่ 6 แขวงสามเสนใน <br> เขตพญาไท กรุงเทพมหานคร 10400</p>  
                <p style="color:white;font-size: 80%">Phone 0-2169-7127 ถึง 36 ต่อ 137 <br>Fax. 0-2619-7137</p>
                <a href="mailto:pfi2562@gmail.com" id="link1"><p style="color:white;font-size: 80%">Email: pfi2562@gmail.com</p></a>
             </ul>
           </footer>
        </div>
           <div style="text-align:center;" id="listPage">
              <div>
                 <button class="bttn1" onclick="fp()">กลับไปค้นหา</button> 
              </div>
              <div id="lPWoekSpace"></div>
           </div>
           <div style="text-align:center;" id="detailPage" ontouchmove="myFunction(event);" ontouchstart="myFunction2(event);" >
              <button class="bttn2" onclick="fp()">กลับไปค้นหา</button>
  
              <div id="lPWoekSpace2"></div>    
           </div>
           <div id="mapPage">
           </div>
      </div>
      <script type="text/javascript">
         //var textSearch=document.getElementById('textSearch');
         var backhome=document.getElementById('backhome');
         var searchcompany=document.getElementById('searchcompany');
         var formGroup0=document.getElementById('formGroup0');
         var formGroup1=document.getElementById('formGroup1');
         var formGroup2=document.getElementById('formGroup2');
         var selecttype=document.getElementById('selecttype');
         var selectPv=document.getElementById('pvSelect');
         var newsPage=document.getElementById('newsPage')
         var firstPage=document.getElementById('firstPage');
         var listPage=document.getElementById('listPage');
         var lPWoekSpace=document.getElementById('lPWoekSpace');
         var detailPage=document.getElementById('detailPage');
         var lPWoekSpace2=document.getElementById('lPWoekSpace2');
         var mapPage=document.getElementById('mapPage');
         detailPage.style.height=window.innerHeight+'px';
         newsPage.style.display='none';
         firstPage.style.display='';
         backhome.style.display='none';
         formGroup0.style.display='';
         formGroup1.style.display='none';
         formGroup2.style.display='none';
         listPage.style.display='none';
         detailPage.style.display='none';
         mapPage.style.display='none';
         var dataSearch=[];
         var newdetail;
         var newDiv;
         var divDetail;
         var region1=['North','Central','South','East','North East'];
         var region2=['ภาคเหนือ','ภาคกลาง','ภาคใต้','ภาคตะวันออก','ภาคตะวันออกเฉียงเหนือ'];
         //alert(data[0][2]);
         function sendType(){
             if(selecttype.value=="0"){
               backhome.style.display='';
                formGroup0.style.display='none';
                formGroup1.style.display='';
                formGroup2.style.display='none';
             }else{
               backhome.style.display='';
                formGroup0.style.display='none';
                formGroup1.style.display='none';
                formGroup2.style.display='';
             }

         }
        /* function searchClick2(x){
            {
            dataSearch=[];
            var x='เชียง';
            for(var j=0;j<data.length;j++){
                if(data[j][0].indexOf(x)!=-1){
                    dataSearch.push(data[j]);}
                    }
         }*/
         function closeNewsPage()
            {
            newsPage.style.display='none';
            backhome.style.display='none';
            firstPage.style.display='';
            }
         function searchClick(n)
            {
            dataSearch=[];
            var str='',ind; 
            //alert (n+' '+searchcompany.value);
            if(n==0){str=selectPv.value; ind=2;}
            else{str=searchcompany.value; ind=0;}
            for(var j=0;j<data.length;j++){if(data[j][ind].indexOf(str)!=-1){dataSearch.push(data[j]);}}
            while (lPWoekSpace.firstChild){lPWoekSpace.firstChild.remove();}
            for(var i=0;i<dataSearch.length;i++)
               {
               newDiv=document.createElement("div");
                  {if((i%2)==0)
                     {
                     newDiv.className=('listDiv1');
                     }else{
                     newDiv.className=('listDiv2');
                     }
                  }
               lPWoekSpace.appendChild(newDiv);
               newDiv.innerText=dataSearch[i][0];
               newDiv.onclick=function()
                  {
                  for(var ii=0;ii<dataSearch.length;ii++)
                     {
                     if(this.innerText==dataSearch[ii][0])
                        {
                        detailCilck(ii);
                        listPage.style.display='none';
                        detailPage.style.display='';
                        }
                     }
                  }
               }
            if(!dataSearch[0]){alert('ไม่พบข้อมูล');}
            firstPage.style.display='none';
            listPage.style.display='';
            /*
            x.onclick=function()
               {
               listPage.removeChild(newDiv);
               newDiv.innerText=dataSearch[0];
               listPage.style.display='none';
               detailPage.style.display='';
               }
            */
            }
         function detailCilck(k)
            {
            while (lPWoekSpace2.firstChild){lPWoekSpace2.firstChild.remove();}
            newdetail=document.createElement('div');
            newdetail.className=('divDetail');
            lPWoekSpace2.appendChild(newdetail);
            var latlng='';
            var address='';
            var phones=[],phone='';
            for(var i=0,l=dataSearch[k][3].length;i<l;i++)
               {
               latlng='';
               if(!i){address+='&nbsp;&nbsp;&nbsp;สำนักงานใหญ่ : '+dataSearch[k][3][i][0];}   
               else {address+='&nbsp;&nbsp;&nbsp;สาขาที่ '+(i+1)+' : '+dataSearch[k][3][i][0];} 
               phones=dataSearch[k][3][i][1].split(',');
               if(dataSearch[k][3][i][2][0]) latlng=dataSearch[k][3][i][2][0]+','+dataSearch[k][3][i][2][1];
               for(var j=0,n=phones.length;j<n;j++)
                  {
                  phone+= '<a href="tel:'+phones[j]+'">'+phones[j]+'</a>'+',';
                  }
                //phone = phone.substring(0, phone.length - 1)  
               if(latlng)address+='&nbsp;&nbsp;&nbsp;<img src = "images/25530.jpg" width= "50px"  height="50px" onclick="gotoMap(\''+latlng+'\');">' 
               address+='<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เบอร์โทร :'+phone.slice(0,-1)+'<br>';
               newdetail.innerHTML= 'ภูมิภาค : '+region2[region1.indexOf(dataSearch[k][6])]+'<br>ชื่อบริษัท : '+dataSearch[k][0]+'<br>ที่อยู่ : <br>'+address+'</p>' ;
               //newdetail.innerHTML+='<img src = "images/25530.jpg" width= "5%"  height="50px" onclick="gotoMap(\''+latlng+'\');">'
              
               }
            }
         function gotoMap(latlng)
            {
               window.open("https://maps.google.com/?q="+latlng); 
            }
         function provinceSelect()
            {
            for(var pv=0;pv<province.length;pv++)
               {    
               var option=document.createElement('option');
               option.value=province[pv][0];
               option.text=province[pv][0];
               selectPv.appendChild(option);
               }
            }
           provinceSelect();
         function fp(){         
            backhome.style.display='none';
               newsPage.style.display='none';
               firstPage.style.display='';
               formGroup0.style.display='';
               formGroup1.style.display='none';
               formGroup2.style.display='none';
               listPage.style.display='none';
               detailPage.style.display='none';
               mapPage.style.display='none';
         }    
         var xp=0;
            function myFunction(event) {
            var x = event.touches[0].clientX;
            var y = event.touches[0].clientY;
         if((xp-x)>100||(x-xp)>100){
            listPage.style.display='';
            detailPage.style.display='none';
         }
}
            function myFunction2(event) {
            var x = event.touches[0].clientX;
            var y = event.touches[0].clientY;
            xp=x;
}

       </script>
   </body>
</html>



 
