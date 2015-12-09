var strings = document.getElementsByTagName('pre')[0].innerHTML.split("\n");
var niceStrings = [];
var vowels = ["a","e","i","o","u"];
var naughtyParts = ["ab", "cd", "pq", "xy"];
for(var i = 0; i < strings.length; i++){
    var vowelCount=0;
    for(var c = 0; c < strings[i].length; c++)
    {
        vowelCount += (vowels.indexOf(strings[i][c].toLowerCase()) !== -1)?1:0;
    }
    if(vowelCount < 3){
        continue;
    }

    var hasNaughtyParts = false;
    for(var c = 0; c < naughtyParts.length; c++){
        if(strings[i].indexOf(naughtyParts[c]) > -1)
        hasNaughtyParts = true;
    }
    if(hasNaughtyParts){
        continue;
    }

    var hasDoubles = false;
    for(var c = 0; c < strings[i].length-1; c++){
        if(strings[i][c]==strings[i][c+1]) {
            hasDoubles=true;
            break;
        }
    }
    if(!hasDoubles){
        continue;
    }
    niceStrings.push(strings[i]);
}

console.log(niceStrings.length);

