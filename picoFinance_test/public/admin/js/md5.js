/*Thongkwow's Family Inc. : Copyright © : Warakorn Thongkwow All rights reserved. : Don't do piracy *=* © ลิขสิทธิ์ : วรากร ทองกวาว สงวนสิทธิ์ทั้งหมด : ห้ามละเมิดลิขสิทธิ์*/ var MD5=function(r){function n(r,n){return r<<n|r>>>32-n}function t(r,n){var t,o,e,u,f;return e=2147483648&r,u=2147483648&n,t=1073741824&r,o=1073741824&n,f=(1073741823&r)+(1073741823&n),t&o?2147483648^f^e^u:t|o?1073741824&f?3221225472^f^e^u:1073741824^f^e^u:f^e^u}function o(r,n,t){return r&n|~r&t}function e(r,n,t){return r&t|n&~t}function u(r,n,t){return r^n^t}function f(r,n,t){return n^(r|~t)}function i(r,e,u,f,i,a,c){return r=t(r,t(t(o(e,u,f),i),c)),t(n(r,a),e)}function a(r,o,u,f,i,a,c){return r=t(r,t(t(e(o,u,f),i),c)),t(n(r,a),o)}function c(r,o,e,f,i,a,c){return r=t(r,t(t(u(o,e,f),i),c)),t(n(r,a),o)}function C(r,o,e,u,i,a,c){return r=t(r,t(t(f(o,e,u),i),c)),t(n(r,a),o)}function g(r){for(var n,t=r.length,o=t+8,e=(o-o%64)/64,u=16*(e+1),f=Array(u-1),i=0,a=0;a<t;)n=(a-a%4)/4,i=a%4*8,f[n]=f[n]|r.charCodeAt(a)<<i,a++;return n=(a-a%4)/4,i=a%4*8,f[n]=f[n]|128<<i,f[u-2]=t<<3,f[u-1]=t>>>29,f}function h(r){var n,t,o="",e="";for(t=0;t<=3;t++)n=r>>>8*t&255,e="0"+n.toString(16),o+=e.substr(e.length-2,2);return o}function d(r){r=r.replace(/\r\n/g,"\n");for(var n="",t=0;t<r.length;t++){var o=r.charCodeAt(t);o<128?n+=String.fromCharCode(o):o>127&&o<2048?(n+=String.fromCharCode(o>>6|192),n+=String.fromCharCode(63&o|128)):(n+=String.fromCharCode(o>>12|224),n+=String.fromCharCode(o>>6&63|128),n+=String.fromCharCode(63&o|128))}return n}var v,S,m,s,A,b,p,w,y,D=[],L=7,M=12,j=17,k=22,q=5,x=9,z=14,B=20,E=4,F=11,G=16,H=23,I=6,J=10,K=15,N=21;for(r=d(r),D=g(r),b=1732584193,p=4023233417,w=2562383102,y=271733878,v=0,l=D.length;v<l;v+=16)S=b,m=p,s=w,A=y,b=i(b,p,w,y,D[v+0],L,3614090360),y=i(y,b,p,w,D[v+1],M,3905402710),w=i(w,y,b,p,D[v+2],j,606105819),p=i(p,w,y,b,D[v+3],k,3250441966),b=i(b,p,w,y,D[v+4],L,4118548399),y=i(y,b,p,w,D[v+5],M,1200080426),w=i(w,y,b,p,D[v+6],j,2821735955),p=i(p,w,y,b,D[v+7],k,4249261313),b=i(b,p,w,y,D[v+8],L,1770035416),y=i(y,b,p,w,D[v+9],M,2336552879),w=i(w,y,b,p,D[v+10],j,4294925233),p=i(p,w,y,b,D[v+11],k,2304563134),b=i(b,p,w,y,D[v+12],L,1804603682),y=i(y,b,p,w,D[v+13],M,4254626195),w=i(w,y,b,p,D[v+14],j,2792965006),p=i(p,w,y,b,D[v+15],k,1236535329),b=a(b,p,w,y,D[v+1],q,4129170786),y=a(y,b,p,w,D[v+6],x,3225465664),w=a(w,y,b,p,D[v+11],z,643717713),p=a(p,w,y,b,D[v+0],B,3921069994),b=a(b,p,w,y,D[v+5],q,3593408605),y=a(y,b,p,w,D[v+10],x,38016083),w=a(w,y,b,p,D[v+15],z,3634488961),p=a(p,w,y,b,D[v+4],B,3889429448),b=a(b,p,w,y,D[v+9],q,568446438),y=a(y,b,p,w,D[v+14],x,3275163606),w=a(w,y,b,p,D[v+3],z,4107603335),p=a(p,w,y,b,D[v+8],B,1163531501),b=a(b,p,w,y,D[v+13],q,2850285829),y=a(y,b,p,w,D[v+2],x,4243563512),w=a(w,y,b,p,D[v+7],z,1735328473),p=a(p,w,y,b,D[v+12],B,2368359562),b=c(b,p,w,y,D[v+5],E,4294588738),y=c(y,b,p,w,D[v+8],F,2272392833),w=c(w,y,b,p,D[v+11],G,1839030562),p=c(p,w,y,b,D[v+14],H,4259657740),b=c(b,p,w,y,D[v+1],E,2763975236),y=c(y,b,p,w,D[v+4],F,1272893353),w=c(w,y,b,p,D[v+7],G,4139469664),p=c(p,w,y,b,D[v+10],H,3200236656),b=c(b,p,w,y,D[v+13],E,681279174),y=c(y,b,p,w,D[v+0],F,3936430074),w=c(w,y,b,p,D[v+3],G,3572445317),p=c(p,w,y,b,D[v+6],H,76029189),b=c(b,p,w,y,D[v+9],E,3654602809),y=c(y,b,p,w,D[v+12],F,3873151461),w=c(w,y,b,p,D[v+15],G,530742520),p=c(p,w,y,b,D[v+2],H,3299628645),b=C(b,p,w,y,D[v+0],I,4096336452),y=C(y,b,p,w,D[v+7],J,1126891415),w=C(w,y,b,p,D[v+14],K,2878612391),p=C(p,w,y,b,D[v+5],N,4237533241),b=C(b,p,w,y,D[v+12],I,1700485571),y=C(y,b,p,w,D[v+3],J,2399980690),w=C(w,y,b,p,D[v+10],K,4293915773),p=C(p,w,y,b,D[v+1],N,2240044497),b=C(b,p,w,y,D[v+8],I,1873313359),y=C(y,b,p,w,D[v+15],J,4264355552),w=C(w,y,b,p,D[v+6],K,2734768916),p=C(p,w,y,b,D[v+13],N,1309151649),b=C(b,p,w,y,D[v+4],I,4149444226),y=C(y,b,p,w,D[v+11],J,3174756917),w=C(w,y,b,p,D[v+2],K,718787259),p=C(p,w,y,b,D[v+9],N,3951481745),b=t(b,S),p=t(p,m),w=t(w,s),y=t(y,A);var O=h(b)+h(p)+h(w)+h(y);return O.toLowerCase()};