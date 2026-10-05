function validateLeave() {

    var from = document.getElementById("from_date").value;
    var to = document.getElementById("to_date").value;

    if (from > to) {

        alert("To date must be after From date.");

        return false;
    }

    return true;
}