const validation = new JustValidate("#signup");
validation
  .addField("#name", [
    {
      rule: "required"
    }
  ])
  .addField("#email", [
    {
      rule: "required"
    },
    {
      rule: "email"
    },
    {
      validator: (value) => {
        return fetch("validate-email.php?email=" + encodeURIComponent(value))
          .then((response) => {
            return response.json();
          })
          .then((json) => {
            return json.available;
          });
      },
      errorMessage: "email already taken"
    }
  ])
  .addField("#password", [
    {
      rule: "required"
    },
    {
      rule: "password"
    }
  ])
  .onSuccess(() => {
    document.querySelector("#signup").submit();
  });
