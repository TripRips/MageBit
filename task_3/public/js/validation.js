
    function validationemail()
    {
        var button = document.getElementById("arrow");
        var button_no_js = document.getElementById("arrow_no_js");
        var form = document.getElementById("form");
        var email = document.getElementById("email").value;
        var email_error = document.getElementById("email_error");
        var text = document.getElementById("checkbox_error");
        var checkBox = document.getElementById("myCheck");
        var valid_email = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;

        button_no_js.style.display = "none";

        if (checkBox.checked == false) {
            text.innerHTML = "You must accept the terms and conditions";
            text.style.display = "unset";
            text.style.color = "#ff0000";
            button.style.pointerEvents = "none";
            button.style.cursor = "none";
        } else {
            text.innerHTML = "";
            text.style.display = "unset";
            text.style.color = "#ff0000";
            button.style.pointerEvents = "none";
            button.style.cursor = "none";
        }

        if (email.length === 0) {
            /* email is empty */
            form.classList.remove("valid");
            form.classList.add("invalid");
            email_error.innerHTML = "Email address is required";
            email_error.style.display = "unset";
            email_error.style.color = "#ff0000";
            button.style.pointerEvents = "none";
            button.style.cursor = "none";
        } else if (!email.match(valid_email)) {
            /* email is invalid */
            form.classList.remove("valid");
            form.classList.add("invalid");
            email_error.innerHTML = "Please provide a valid e-mail address";
            email_error.style.display = "unset";
            email_error.style.color = "#ff0000";
            button.style.pointerEvents = "none";
            button.style.cursor = "none";
        } else if (email.endsWith('.co')) {
            /* email ends with .co */
            form.classList.remove("valid");
            form.classList.add("invalid");
            email_error.innerHTML = "Not accepting subscriptions from Colombia";
            email_error.style.display = "unset";
            email_error.style.color = "#ff0000";
            button.style.pointerEvents = "none";
            button.style.cursor = "none";
        } else {
            /* email is valid */
            form.classList.remove("valid");
            form.classList.add("invalid");
            email_error.innerHTML = "";
            email_error.style.display = "unset";
            email_error.style.color = "#ff0000";

            if (checkBox.checked == false) {
                button.style.pointerEvents = "none";
                button.style.cursor = "none";
            } else {
                button.style.pointerEvents = "unset";
                button.style.cursor = "pointer";
            }
        }

    }


