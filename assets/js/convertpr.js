function convert(val){
    var a=document.getElementById("coinOpt").selectedIndex;
    var a1=document.getElementById("coinOpt").options;
    var b=document.getElementById("changeOpt").selectedIndex;
    var c=document.getElementById("changeOpt").options;
    var d=document.getElementById("converted");
    if(a1[a].index==0 && c[b].index==0){
        d.value=val*5065.91;
    }
    if(a1[a].index==0 && c[b].index==1){
        d.value=val*350006.88;
    }
    if(a1[a].index==0 && c[b].index==2){
        d.value=val*564532.01;
    }
    
    if(a1[a].index==1 && c[b].index==0){
        d.value=val*0.338898;
    }
    if(a1[a].index==1 && c[b].index==1){
        d.value=val*24.29;
    }
    if(a1[a].index==1 && c[b].index==2){
        d.value=val*38;
    }
    
    if(a1[a].index==2 && c[b].index==0){
        d.value=val*173.56;
    }
    if(a1[a].index==2 && c[b].index==1){
        d.value=val*12098.86;
    }
    if(a1[a].index==2 && c[b].index==2){
        d.value=val*19435.25;
    }
}
function convert1(){
    var a=document.getElementById("coinOpt").selectedIndex;
    var a1=document.getElementById("coinOpt").options;
    var b=document.getElementById("changeOpt").selectedIndex;
    var c=document.getElementById("changeOpt").options;
    var e=document.getElementById("inp");
    var d=document.getElementById("converted");
   if(a1[a].index==0 && c[b].index==0){
        d.value=(e.value)*5065.91;
    }
    if(a1[a].index==0 && c[b].index==1){
        d.value=(e.value)*350006.88;
    }
    if(a1[a].index==0 && c[b].index==2){
        d.value=(e.value)*564532.01;
    }
    
    if(a1[a].index==1 && c[b].index==0){
        d.value=(e.value)*0.338898;
    }
    if(a1[a].index==1 && c[b].index==1){
        d.value=(e.value)*24.29;
    }
    if(a1[a].index==1 && c[b].index==2){
        d.value=(e.value)*38;
    }
    
    if(a1[a].index==2 && c[b].index==0){
        d.value=(e.value)*173.56;
    }
    if(a1[a].index==2 && c[b].index==1){
        d.value=(e.value)*12098.86;
    }
    if(a1[a].index==2 && c[b].index==2){
        d.value=(e.value)*19435.25;
    }
}
function convert2(val){
    var a=document.getElementById("coinOpt").selectedIndex;
    var a1=document.getElementById("coinOpt").options;
    var b=document.getElementById("changeOpt").selectedIndex;
    var c=document.getElementById("changeOpt").options;
    var d=document.getElementById("inp");
    if(a1[a].index==0 && c[b].index==0){
        d.value=val/5065.91;
    }
    if(a1[a].index==0 && c[b].index==1){
        d.value=val/350006.88;
    }
    if(a1[a].index==0 && c[b].index==2){
        d.value=val/564532.01;
    }
    
    if(a1[a].index==1 && c[b].index==0){
        d.value=val/0.338898;
    }
    if(a1[a].index==1 && c[b].index==1){
        d.value=val/24.29;
    }
    if(a1[a].index==1 && c[b].index==2){
        d.value=val/38;
    }
    
    if(a1[a].index==2 && c[b].index==0){
        d.value=val/173.56;
    }
    if(a1[a].index==2 && c[b].index==1){
        d.value=val/12098.86;
    }
    if(a1[a].index==2 && c[b].index==2){
        d.value=val/19435.25;
    }
}