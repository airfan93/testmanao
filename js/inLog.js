let btnSend = document.getElementById('inSend')
btnSend.removeAttribute("disabled")
btnSend.addEventListener('click',(e)=>{
    e.preventDefault();
    let uData={
        uLogin:$('#inLog').val(),
        uPwd:$('#inPwd').val(),
    }
    $.ajax({
        url:'./php/in.php',
        type: "POST",
        data:uData,
        success:(d)=>{
            let ePwd = $('#inPwdErr');
            let eLog = $('#inLogErr');
            let data = JSON.parse(d)
            console.log(data)

            ePwd.text('')
            eLog.text('')
            for (const err of data) {
                switch(err.input){

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


