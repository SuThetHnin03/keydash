function getLevels(event) {
    //getting levels
    let selectedValues = level.value;
    //declare for level set
    let lvl = "";

    //to choose the level
    switch (selectedValues) {
        case "i":
            lvl = "2";
        break;

        case "a":
            lvl = "3";
        break;

        default:
            lvl = "1"
            break;
    }

    //Clear existing options
    lvlLessons.innerHTML = "";

    //create the options
    for (let i = 1; i <= 5; i++) {
        let opt = document.createElement('option');
        let optText = document.createTextNode(`${lvl}_${i}`)

        opt.appendChild(optText);
        opt.setAttribute('value', `${lvl}_${i}`);

        lvlLessons.appendChild(opt)
    }
}

let level = document.querySelector("#level");
let lvlLessons = document.querySelector("#lvl-lessons");

level.addEventListener('change', getLevels)

getLevels()
