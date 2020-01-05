
//BANK DETAILS

function p_type(id) {

    var type = document.getElementById(id).value;

    var p_input = document.getElementById("p_input");
    
    p_input.innerHTML = "";

    if(type == "Transfer"){
        var elem = document.createElement("div");
        var att = document.createAttribute("class");
        att.value = "col-sm-offset-2 col-sm-8 row";
        elem.setAttributeNode(att);

        var elem2 = document.createElement("input");
        var att2 = document.createAttribute("type");
        att2.value = "text";
        elem2.setAttributeNode(att2);

        var att3 = document.createAttribute("class");
        att3.value = "form-control";
        elem2.setAttributeNode(att3);

        var att4 = document.createAttribute("name");
        att4.value = "acc_name";
        elem2.setAttributeNode(att4);

        var att5 = document.createAttribute("value");
        att5.value = "Muhtasib Resources Nigeria LTD.";
        elem2.setAttributeNode(att5);

        var att6 = document.createAttribute("readonly");
        att6.value = "readonly";
        elem2.setAttributeNode(att6);

        elem.appendChild(elem2);
        p_input.appendChild(elem);

        //SECOND DIV
        var elem = document.createElement("div");
        var att = document.createAttribute("class");
        att.value = "col-sm-offset-2 col-sm-8 row";
        elem.setAttributeNode(att);

        var elem2 = document.createElement("input");
        var att2 = document.createAttribute("type");
        att2.value = "text";
        elem2.setAttributeNode(att2);

        var att3 = document.createAttribute("class");
        att3.value = "form-control";
        elem2.setAttributeNode(att3);

        var att4 = document.createAttribute("name");
        att4.value = "acc_no";
        elem2.setAttributeNode(att4);

        var att5 = document.createAttribute("value");
        att5.value = "2054870550";
        elem2.setAttributeNode(att5);

        var att6 = document.createAttribute("readonly");
        att6.value = "readonly";
        elem2.setAttributeNode(att6);

        elem.appendChild(elem2);
        p_input.appendChild(elem);

        //THIRD DIV
        var elem = document.createElement("div");
        var att = document.createAttribute("class");
        att.value = "col-sm-offset-2 col-sm-8 row";
        elem.setAttributeNode(att);

        var elem2 = document.createElement("input");
        var att2 = document.createAttribute("type");
        att2.value = "text";
        elem2.setAttributeNode(att2);

        var att3 = document.createAttribute("class");
        att3.value = "form-control";
        elem2.setAttributeNode(att3);

        var att4 = document.createAttribute("name");
        att4.value = "bank";
        elem2.setAttributeNode(att4);

        var att5 = document.createAttribute("value");
        att5.value = "UBA BANK";
        elem2.setAttributeNode(att5);

        var att6 = document.createAttribute("readonly");
        att6.value = "readonly";
        elem2.setAttributeNode(att6);

        elem.appendChild(elem2);
        p_input.appendChild(elem);        
    }
    else if(type == "Card"){
        var elem = document.createElement("div");
        var att = document.createAttribute("class");
        att.value = "col-sm-offset-2 col-sm-8 row";
        elem.setAttributeNode(att);

        var elem2 = document.createElement("input");
        var att2 = document.createAttribute("type");
        att2.value = "text";
        elem2.setAttributeNode(att2);

        var att3 = document.createAttribute("class");
        att3.value = "form-control";
        elem2.setAttributeNode(att3);

        var att4 = document.createAttribute("name");
        att4.value = "holder";
        elem2.setAttributeNode(att4);

        var att5 = document.createAttribute("maxlength");
        att5.value = "60";
        elem2.setAttributeNode(att5);

        var att6 = document.createAttribute("placeholder");
        att6.value = "Card Holder's Name";
        elem2.setAttributeNode(att6);

        elem.appendChild(elem2);
        p_input.appendChild(elem);

        //SECOND DIV
        var elem = document.createElement("div");
        var att = document.createAttribute("class");
        att.value = "col-sm-offset-2 col-sm-8 row";
        elem.setAttributeNode(att);

        var elem2 = document.createElement("input");
        var att2 = document.createAttribute("type");
        att2.value = "text";
        elem2.setAttributeNode(att2);

        var att3 = document.createAttribute("class");
        att3.value = "form-control";
        elem2.setAttributeNode(att3);

        var att4 = document.createAttribute("name");
        att4.value = "card_no";
        elem2.setAttributeNode(att4);

        var att5 = document.createAttribute("maxlength");
        att5.value = "16";
        elem2.setAttributeNode(att5);

        var att6 = document.createAttribute("placeholder");
        att6.value = "Card Number";
        elem2.setAttributeNode(att6);

        elem.appendChild(elem2);
        p_input.appendChild(elem);

        //THIRD DIV
        var elem = document.createElement("div");
        var att = document.createAttribute("class");
        att.value = "col-sm-offset-2 col-sm-8 row";
        elem.setAttributeNode(att);

        var elem2 = document.createElement("input");
        var att2 = document.createAttribute("type");
        att2.value = "text";
        elem2.setAttributeNode(att2);

        var att3 = document.createAttribute("class");
        att3.value = "form-control";
        elem2.setAttributeNode(att3);

        var att4 = document.createAttribute("name");
        att4.value = "ccv";
        elem2.setAttributeNode(att4);

        var att5 = document.createAttribute("maxlength");
        att5.value = "3";
        elem2.setAttributeNode(att5);

        var att6 = document.createAttribute("placeholder");
        att6.value = "CCV";
        elem2.setAttributeNode(att6);

        elem.appendChild(elem2);
        p_input.appendChild(elem);

        //FOURTH DIV
        var elem = document.createElement("div");
        var att = document.createAttribute("class");
        att.value = "col-sm-offset-2 col-sm-8 row";
        elem.setAttributeNode(att);

        var elem2 = document.createElement("input");
        var att2 = document.createAttribute("type");
        att2.value = "text";
        elem2.setAttributeNode(att2);

        var att3 = document.createAttribute("class");
        att3.value = "form-control";
        elem2.setAttributeNode(att3);

        var att4 = document.createAttribute("name");
        att4.value = "expiry";
        elem2.setAttributeNode(att4);

        var att5 = document.createAttribute("maxlength");
        att5.value = "7";
        elem2.setAttributeNode(att5);

        var att6 = document.createAttribute("placeholder");
        att6.value = "Expiry Date. e.g(12/2017)";
        elem2.setAttributeNode(att6);

        elem.appendChild(elem2);
        p_input.appendChild(elem);
    }

    var btn = document.getElementById("btn");
    
    btn.innerHTML = "";
    var elem = document.createElement("div");
    var att = document.createAttribute("class");
    att.value = "col-sm-offset-2 col-sm-8";
    elem.setAttributeNode(att);

    var elem2 = document.createElement("input");
    var att2 = document.createAttribute("type");
    att2.value = "submit";
    elem2.setAttributeNode(att2);

    var att3 = document.createAttribute("class");
    att3.value = "btn bcolor-red col-sm-12";
    elem2.setAttributeNode(att3);

    var att4 = document.createAttribute("name");
    att4.value = "submit";
    elem2.setAttributeNode(att4);

    var att5 = document.createAttribute("value");
    att5.value = "Make Payment";
    elem2.setAttributeNode(att5);

    elem.appendChild(elem2);
    btn.appendChild(elem);    
}