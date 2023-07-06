$("#cari").keyup(function () {
    var value = this.value.toLowerCase().trim();

    $("table tr").each(function (index) {
        if (!index) return;
        $(this).find("td").each(function () {
            var id = $(this).text().toLowerCase().trim();
            var tidakada = (id.indexOf(value) == -1);
            $(this).closest('tr').toggle(!tidakada);
            return tidakada;
        });
    });
});