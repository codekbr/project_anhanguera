function serialize(array) {
    var o = {};
    var a = array;
    $.each(a, function() {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name] += this.value || "";
        } else {
            o[this.name] = this.value || "";
        }
    });
    return o;
}