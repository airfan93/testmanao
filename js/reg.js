let btnSend = document.getElementById('regSend')
btnSend.removeAttribute("disabled")
btnSend.addEventListener('click',(e)=>{
    e.preventDefault();
    let uData={
        uEmail:$('#regEmail').val(),
        uPwd:$('#regPwd').val(),
        uCPwd:  $('#regPwdCon').val(),
        uLogin: $('#regLog').val(),
        uName: $('#regName').val()
    }
    $.ajax({
        url:'./php/reg.php',
        type: "POST",
        data:uData,
        success:(d)=>{ 
            let eName = $('#regNameErr');
            let eEmail = $('#regEmailErr');
            let eCPwd = $('#regPwdConErr');
            let ePwd = $('#regPwdErr');
            let eLog = $('#regLogErr');
            let data = JSON.parse(d)
            eName.text('')
            eEmail.text('')
            eCPwd.text('')
            ePwd.text('')
            eLog.text('')
            for (const err of data) {
                switch(err.input){
                    
                    case 'name': eName.append(err.value+' ')
                    break
                    case 'email': eEmail.append(err.value+' ')
                    break
                    case 'cPwd':eCPwd.append(err.value+' ')
                    break
                    case 'pwd': ePwd.append(err.value+' ')
                    break
                    case 'login':eLog.append(err.value+' ')
                    break
                    case 'newCreated':   location.href='index.php'
                    break
                    default:$('#answer').html(err.value)
                }
                
                    
                
            }
            
        }
    })
})


