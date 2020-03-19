function trackTableChangeColor(t) {
    $('#trackTable').find('tr').each(function() {
        // var row = this;
        this.style.backgroundColor = 'white';
    });
    t.style.backgroundColor = '#F9CFCF';
}
