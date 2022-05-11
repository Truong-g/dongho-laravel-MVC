function highlight([first, ...strings], ...value){
    return value.reduce(function(acc, cur, index)
    {
        return [...acc, `<span>${cur}</span>`, strings.shift()]
    }, [first])

}

var brand = 'F8';
var course = 'Javascript';

const html = highlight`Hoc lap trinh ${course} tại ${brand}!`
console.log(html)