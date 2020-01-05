function html_entity_decode(str) {
  if(str == null){
    return "";
  }
  var ta = document.createElement("textarea");
  ta.innerHTML=str.replace(/</g,"&lt;").replace(/>/g,"&gt;");
  toReturn = ta.value;
  ta = null;
  return toReturn
}
function isNumber(evt){
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if(charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
    }
    return true;
}
function isPSNo(evt){
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if(charCode > 31 && charCode != 42 && (charCode < 48 || charCode > 57)){
        return false;
    }
    return true;
}
function isNumericalValue(evt){
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if(charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46){
        return false;
    }
    return true;
}
function pad(num,size) {
    var s = "00000000" + num;
    return s.substr(s.length-size);
}