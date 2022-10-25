function imlecGiris(){
    let tx1 = document.getElementById('id');
    let tx2 = document.getElementById('sifre');
    let a = document.getElementById('buton');
    if(tx1.value!="" && tx2.value!=""){
        a.classList.remove("pasif");
        a.classList.add("aktif");
        a.disabled=false;
    }
    else{
        a.classList.remove("aktif");
        a.classList.add("pasif");
        a.disabled=true;
    }
}

function imlecKayit(){
    let tx1 = document.getElementById('ad');
    let tx2 = document.getElementById('soyad');
    let tx3 = document.getElementById('id');
    let tx4 = document.getElementById('sifre');
    let tx5 = document.getElementById('sifrekontrol');
    let tx6 = document.getElementById('eposta');
    let a = document.getElementById('buton');
    if(tx1.value!="" && tx2.value!="" && tx3.value!="" && tx4.value!="" && tx5.value!="" && tx6.value!=""){
        a.classList.remove("pasif");
        a.classList.add("aktif");
        a.disabled=false;
    }
    else{
        a.classList.remove("aktif");
        a.classList.add("pasif");
        a.disabled=true;
    }
}

function sifreGoster(){
    var parola = document.getElementById('sifre');
    if(parola.type=="password"){
        parola.type="text";
    }
    else{
        parola.type="password";
    }
}

function tikla(){
    var check = document.getElementById('pg');
    if(check.checked==false){
        check.checked=true;
    }
    else{
        check.checked=false;
    }
    sifreGoster();
}

function begen(){
    
}
