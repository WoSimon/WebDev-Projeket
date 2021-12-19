//Prüft ob alle Werte eingegeben wurden wurden
function check(){
    erg = true;
    a = document.messageForm;
    if(a.name.value == ''){erg = false;}
    if(a.email.value == ''){erg = false;}  
    if(a.subject.value == ''){erg = false;}
    if(a.message.value == ''){erg = false;}
    
    if(erg == false){alert('Bitte füllen Sie alle Felder im Formular aus!')}
    
    return erg;
}