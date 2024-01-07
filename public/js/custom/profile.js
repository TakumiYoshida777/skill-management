'use strict';


const prOriginalState = document.getElementById("prOriginalState");
const quoteButton = document.getElementById("quoteButton");
const prTextArea = document.getElementById("prTextArea");

console.log(prOriginalState,1);
console.log(prTextArea,"prTextArea");
console.log(prTextArea.textContent,"prTextArea.textContent---1");

const quote = e => {
    if(confirm('変更が既存データで上書きされます。\nよろしいですか？')) {
        const data = prOriginalState.innerText;
        prTextArea.value = data;
    }
 }
