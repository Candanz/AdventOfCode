var data = document.getElementsByTagName('pre')[0].innerHTML.split("\n");
var paper = 0;
var ribbon = 0;
var bow = 0;
for(var i = 0; i < data.length - 1; i++){
    var dimensions = data[i].split('x').map(Number);
    var sides = [];
    var d = 0; var j = 0;
    for(d = 0, j = dimensions.length -1; d < dimensions.length; j = d++) {
        paper += 2 * dimensions[j] * dimensions[d];
        sides.push(dimensions[j] * dimensions[d]);
    }

    dimensions.sort(function(a, b){return a-b});
    ribbon += dimensions[0] * 2 + dimensions[1] * 2;
    bow += dimensions[0] * dimensions[1] * dimensions[2];

    min = sides.reduce(function(a, b, i, sides){return Math.min(a,b)});
    paper += min;

    console.log(data[i] + " : " + paper + " - " +ribbon);
}

console.log("Paper: " + paper);
console.log("Ribbon: " + ribbon);
console.log("Bow: " + bow);
console.log("Ribbon Total:" + (ribbon+bow));