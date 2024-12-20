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
         <div class="container" id="container">
            <div class="logo">
               <a href="http://1359.go.th/"><img src = "images/logo.png" width= "120px" height="120px"></a>
               <div class="text1" id="text1"> 
                  <p style = "color:white;font-size:20px;">รายชื่อผู้ประกอบธุรกิจสินเชื่อรายย่อยระดับจังหวัดภายใต้การกำกับ</p>
                  <p style = "color:white;font-size:20px;"> (สินเชื่อพิโกไฟแนนซ์) ที่เปิดดำเนินการ</p>
               </div>
               <div class="form-group">
                  <div class="text2" id="text2">
                     <p style="color:white;font-size:20px;">ค้นหาผู้ประกอบการพิโกไฟแนนซ์</p>
                  </div>
                  <select  class="old-select" id="pvSelect" style="width:200px; height:50px; font-size: 19px; text-align-last:center;" ></select>
                  <br>
                  <br>
                  <button class="button0" style="vertical-align:middle" OnClick="searchClick()";><span>ค้นหา</span></button><br>
               </div><br>
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
           <div style="text-align:center;" id="detailPage">
              <button class="bttn2" onclick="fp()">กลับไปค้นหา</button>
              <div id="lPWoekSpace2"></div>    
           </div>
           <div id="mapPage">
           </div>
      <script type="text/javascript">
         //var textSearch=document.getElementById('textSearch');
         var selectPv=document.getElementById('pvSelect');
         var newsPage=document.getElementById('newsPage')
         var firstPage=document.getElementById('firstPage');
         var listPage=document.getElementById('listPage');
         var lPWoekSpace=document.getElementById('lPWoekSpace');
         var detailPage=document.getElementById('detailPage');
         var lPWoekSpace2=document.getElementById('lPWoekSpace2');
         var mapPage=document.getElementById('mapPage');
         newsPage.style.display='none';
         firstPage.style.display='';
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
         function closeNewsPage()
            {
            newsPage.style.display='none';
            firstPage.style.display='';
            }
         function searchClick()
            {
            dataSearch=[];
            for(var j=0;j<data.length;j++){if(selectPv.value==data[j][2]){dataSearch.push(data[j]);}}
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
            var latlng='13.7819385,100.5350954';
            while (lPWoekSpace2.firstChild){lPWoekSpace2.firstChild.remove();}
            newdetail=document.createElement('div');
            newdetail.className=('divDetail');
            lPWoekSpace2.appendChild(newdetail);
            var address='';
            var phones=[],phone='';
            for(var i=0,l=dataSearch[k][3].length;i<l;i++)
               {
               if(!i){address+='&nbsp;&nbsp;&nbsp;สำนักงานใหญ่ : '+dataSearch[k][3][i][0];}   
               else {address+='&nbsp;&nbsp;&nbsp;สาขาที่ '+(i+1)+' : '+dataSearch[k][3][i][0];} 
               phones=dataSearch[k][3][i][1].split(',');
               for(var j=0,n=phones.length;j<n;j++)
                  {
                  phone+= '<a href="tel:'+phones[j]+'">'+phones[j]+'</a>'+',';
                  }
               address+='<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เบอร์โทร :'+phone+'<br>';
               }
            
            newdetail.innerHTML= 'ภูมิภาค : '+region2[region1.indexOf(dataSearch[k][6])]+'<br>ชื่อบริษัท : '+dataSearch[k][0]+'<br>ที่อยู่ : <br>'+address+'</p>';
            //newdetail.innerHTML+='<img src = "images/2005.jpg" width= "100%"  height="350px" onclick="gotoMap('+latlng+');">'
            }
         function gotoMap(lat,lng)
            {
               window.open("https://maps.google.com/?q="+lat+','+lng); 
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
            firstPage.style.display='';
            listPage.style.display='none';
            detailPage.style.display='none';
            mapPage.style.display='none';
            //detailPage.removeChild(newdetail);
         }
       </script>
   </body>
</html>



 
