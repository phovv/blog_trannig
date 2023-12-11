$(document).ready(function () {
    $(function () {
        $("#entered_date_from").datepicker({ dateFormat: "yy/mm/dd" });
        $("#entered_date_to").datepicker({ dateFormat: "yy/mm/dd" });
        $("#entered_date").datepicker({ dateFormat: "yy/mm/dd" });
    });
    jQuery.validator.addMethod("validateDate", function (value, element) {
        var rxDatePattern = /^(\d{4})(\/)(\d{2})(\/)(\d{2})$/;
        var dtArray = value.match(rxDatePattern);
        if (dtArray != null) {
            var dtYear = dtArray[1];
            var dtMonth = dtArray[3];
            var dtDay = dtArray[5];
            if (dtMonth < 1 || dtMonth > 12) return false;
            else if (dtDay < 1 || dtDay > 31) return false;
            else if (
                (dtMonth == 4 ||
                    dtMonth == 6 ||
                    dtMonth == 9 ||
                    dtMonth == 11) &&
                dtDay == 31
            )
                return false;
            else if (dtMonth == 2) {
                var isleap =
                    dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0);
                if (dtDay > 29 || (dtDay == 29 && !isleap)) return false;
            }
        }
        return (
            this.optional(element) ||
            /^(\d{4})(\/)(\d{2})(\/)(\d{2})$/.test(value)
        );
    });
});
function open_file() {
    const fileimport = document.getElementById("file").click();
    $("#file").on("change", function () {
        document.getElementById("btn_import").click();
    });
}
