var map = document.getElementsByTagName('pre')[0].textContent;
var houses = [{x:0,y:0}];
var pos = {x:0, y:0};
for(var i = 0; i < map.length; i++){
    switch(map[i]){
        case "v":
            pos.y--;
            break;
        case "^":
            pos.y++;
            break;
        case ">":
            pos.x++;
            break;
        case "<":
            pos.x--;
            break;
    }
    if(!houses.some(function(e) { return e.x === pos.x && e.y === pos.y })) {
        houses.push({x:pos.x,y:pos.y});
    }
}

console.log(houses.length);