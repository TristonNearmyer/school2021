function hello(compiler) {
    console.log("Hello from " + compiler);
}
hello("TypeScript");
function compareNumbers() {
    var result = document.getElementById('result');
    var stringVal1 = document.getElementById('value1').value;
    var stringVal2 = document.getElementById('value2').value;
    var val1 = parseInt(stringVal1);
    var val2 = parseInt(stringVal2);
    if (isNaN(val1) || isNaN(val2)) {
        alert("please enter a number");
    }
    if (val1 == val2) {
        result.textContent = "the two numbers are equal";
        return;
    }
    if (val1 > val2) {
        result.textContent = val1 + " is bigger";
        return;
    }
    if (val1 < val2) {
        result.textContent = val2 + " is bigger";
        return;
    }
}
