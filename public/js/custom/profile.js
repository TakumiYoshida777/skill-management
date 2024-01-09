'use strict';


const prOriginalState = document.getElementById("prOriginalState");
const quoteButton = document.getElementById("quoteButton");
const prTextArea = document.getElementById("prTextArea");

const quote = e => {
    if(confirm('変更が既存データで上書きされます。\nよろしいですか？')) {
        const data = prOriginalState.value;
        console.log(data,"data")
        prTextArea.value = data;
    }
 }
