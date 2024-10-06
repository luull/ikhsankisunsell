document
    .querySelector("input[inputmode='numeric']")
    .addEventListener("input", (e) => {
        const value = e.target.value;
        const notDigit = /\D/;

    if (notDigit.test(value) === true){
        e.target.value = value.replace(/\D/g, "");
    }
    console.log(value);
});
