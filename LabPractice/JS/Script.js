function analyzeText(){

let text = document.getElementById("textInput").value;

if(text == ""){
document.getElementById("result").innerHTML = "Please enter some text";
return;
}

let charCount = text.length;

let words = text.split(" ");
let wordCount = words.length;

let reversedText = "";
for(let i = text.length - 1; i >= 0; i--){
reversedText = reversedText + text[i];
}

document.getElementById("result").innerHTML =
"Character Count: " + charCount + "<br>" +
"Word Count: " + wordCount + "<br>" +
"Reversed Text: " + reversedText;

}