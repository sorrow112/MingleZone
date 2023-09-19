function editFullName(){

    (async () => {
        const { value: formValues } = await Swal.fire({
            html:
                '<form method="POST" action="formHandlings/editUser.php">' +
                '<h3>edit your name</h3>'+
                '<input required id="swal-input1" name="firstName" class="swal2-input mb-3" type="text" placeholder="first name">' +
                '<input required id="swal-input2" name="lastName" class="swal2-input" type="text" placeholder="last name">' +
                '<br><button name="submitName" class="mb-4 mt-3 btn btn-primary" type="submit">Confirm</button>' +
                '</form>',
            showConfirmButton:false,
            width:'570px',
        })
    })();
}
function editAvatar(){

    (async () => {
        const { value: formValues } = await Swal.fire({
            html:
                '<form method="POST" action="formHandlings/editUser.php" enctype="multipart/form-data">' +
                '<h3>edit your name</h3>'+
                '<input required id="swal-input1" name="image" class="swal2-input mb-3" type="file" >' +
                '<br><button name="submitImage" class="mb-4 mt-3 btn btn-primary" type="submit">Confirm</button>' +
                '</form>',
            showConfirmButton:false,
            width:'570px',
        })
    })();
}
function editEmail(){
    (async () => {
        const { value: formValues } = await Swal.fire({
            html:
                '<form method="POST" action="formHandlings/editUser.php">' +
                '<h3>edit your email</h3>'+
                '<input required id="swal-input1" name="email" class="form-control register-input" type="email" placeholder="email">' +
                '<br><button name="submitEmail" class="mb-4 mt-3 btn btn-primary" type="submit">Confirm</button>' +
                '</form>',
            showConfirmButton:false,
            width:'570px',
        })
    })();
}

function editPhone(){
    (async () => {
        const { value: formValues } = await Swal.fire({
            html:
                '<form method="POST" action="formHandlings/editUser.php">' +
                '<h3>edit your phone number</h3>'+
                '<input required id="swal-input1" name="phone" class="swal2-input mb-3" type="text" placeholder="phone">' +
                '<br><button name="submitPhone" class="mb-4 mt-3 btn btn-primary" type="submit">Confirm</button>' +
                '</form>',
            showConfirmButton:false,
            width:'570px',
        })
    })();
}

function editPassword(){
    (async () => {
        const { value: formValues } = await Swal.fire({
            html:
                '<form method="POST" action="formHandlings/editUser.php">' +
                '<h3>edit your password</h3>'+
                '<input required id="swal-input1" name="password" class="swal2-input mb-3" type="password" placeholder="password">' +
                '<br><button name="submitPassword" class="mb-4 mt-3 btn btn-primary" type="submit">Confirm</button>' +
                '</form>',
            showConfirmButton:false,
            width:'570px',
        })
    })();
}