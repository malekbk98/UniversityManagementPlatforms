active="";
function search_op(){
    var option=document.getElementById('search_option');
    var div = document.getElementById('search');
    if(document.getElementById('search_bar')!=null){
        document.getElementById('search_bar').remove();
    }
    if(active!=""){
        document.getElementById(active).setAttribute("class","hidden");
    }
    switch(option.value) {
        case "fname":
            div.innerHTML+='<div class="form-group d-inline-block" id="search_bar"><input id="inp" type="text" class="form-control" Placeholder="Insert First Name" onkeyup="search(0,0)"></div>';
          break;
        case "lname":
            div.innerHTML+='<div class="form-group d-inline-block" id="search_bar"><input  id="inp" type="text" class="form-control" Placeholder="Insert Last Name" onkeyup="search(0,1)"></div>';
          break;
        case "class":
            var cls = document.getElementById('cls');
            cls.setAttribute("class","d-inline-block");
            active="cls";
          break;
        case "dep":
            var dep = document.getElementById('dep');
            dep.setAttribute("class","d-inline-block");
            active="dep";
          break;
        case "spec":
            var spc = document.getElementById('spc');
            spc.setAttribute("class","d-inline-block");
            active="spc";
          break;  
        default:
      }
}

function search(n,t){
    if(n==0){
        data=document.getElementById('inp').value;
    }else{
        data=document.getElementById(n).value;
    }
    filter = data.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[t];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }       
    }
}

function checkAll(ele) {
    var checkboxes = document.getElementsByTagName('input');
    if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = true;
            }
        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
            console.log(i)
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = false;
            }
        }
    }
}

function check(){
    var checkboxes = document.getElementsByTagName('input');
    var btn=document.getElementById('mod');

    verif=false;
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox' && checkboxes[i].checked == true) {
                verif=true;
                break;
            }
        }
    if(!verif){
        btn.removeAttribute("data-toggle");
        btn.removeAttribute("data-target");
        btn.style.cursor="not-allowed";
        alert("You need to select at least one user");

    }else{
        btn.setAttribute("data-toggle","modal");
        btn.setAttribute("data-target","#myModal");
        btn.style.cursor="pointer";
    }
}