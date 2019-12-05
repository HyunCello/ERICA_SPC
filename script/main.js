function openNav(){  /*style의 크기를 30%로 변경*/
    document.getElementById("myTopnav").style.height = "30%";
}
function closeNav(){ /*style의 크기를 0으로 변경*/
    document.getElementById("myTopnav").style.height = "0";
}

function readTextFileAlert(file) {
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function () {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                var allText = rawFile.responseText;
                //document.write(allText);
                alert(allText);
            }
        }
    };
    rawFile.send(null);
}

function readTextFile(file) {
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function () {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                var allText = rawFile.responseText;
                document.write(allText);
                //alert(allText);
            }
        }
    };
    rawFile.send(null);
}


