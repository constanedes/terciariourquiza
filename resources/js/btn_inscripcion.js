var clic = 1;

function divLogin() {

    if (clic == 1) {

        document.getElementById("caja").style.height = "100px";

        clic = clic + 1;

    } else {

        document.getElementById("caja").style.height = "0px";

        clic = 1;

    }

}