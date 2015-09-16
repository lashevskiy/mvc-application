/**
 * Created by lashevskiy on 15.09.2015.
 */
function CheckRegForm(form) {
    if (form.username.value == "") {
        alert("Error: Username cannot be blank!");
        form.username.focus();
        return false;
    }

    var validChars = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if (!validChars.test(form.email.value) || form.email.value == "") {
        alert('Error: мыло то забыл написать!');
        form.email.focus();
        return false;
    }

    validChars = /^\w+$/;
    if (!validChars.test(form.username.value)) {
        alert("Error: Username must contain only letters, numbers and underscores!");
        form.username.focus();
        return false;
    }

    if (form.password.value == form.username.value) {
        alert("Error: Password must differ from Username");
        form.password.focus();
        return false;
    }

    /*return CheckPassword(form) !== false;*/
}