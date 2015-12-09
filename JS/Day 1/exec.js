var e = document.getElementsByTagName('pre')[0].innerHTML;
var f=0;
for(var i =0;i<e.length;i++){ f+=(e[i]=='('?1:-1); if(f==-1)console.log(i-1)}
console.log(f);