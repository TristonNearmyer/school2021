function hello(compiler: string) {
  console.log(`Hello from ${compiler}`);
}
hello("TypeScript");

function compareNumbers(){

  let result:HTMLElement = document.getElementById('result');

  let stringVal1 = (<HTMLInputElement>document.getElementById('value1')).value;
  let stringVal2 = (<HTMLInputElement>document.getElementById('value2')).value;

  let val1: number = parseInt(stringVal1);
  let val2: number = parseInt(stringVal2);

  if (isNaN(val1) || isNaN(val2)){
    alert("please enter a number");
  }

  if (val1 == val2){
    result.textContent = "the two numbers are equal";
    return;
  }

  if (val1 > val2){
    result.textContent = val1 + " is bigger";
    return;
  }

  if (val1 < val2){
    result.textContent = val2 + " is bigger";
    return;
  }
}