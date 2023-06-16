const validation = new JustValidate("#signup");

validation
    .addField("#nom", [
        {
            rule: "required"
        }
    ])
    .addField("#mail",[
        {
            rule: "required"
        },
        {
            rule: "email"
        },
        {
            validator: (value) => () => {
                return fetch("mail_valide.php?mail=" + encodeURIComponent(value))
                        .then(function(response) {
                            return response.json();
                        })
                        .then(function(json) {
                            return json.available;
                        });
            },
            errorMessage: "mail déjà pris"
        }
    ])
    .addField("#mdp",[
        {
            rule: "required"
        },
        {
            rule: "password"
        }
    ])
    .addField("#mdp_confirm",[
        {
            validator: (value, fields) => {
                return value === fields["#mdp"].elem.value;
            },
            errorMessage: "Les mots de passes ne sont pas identiques"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("signup").submit();
    });